<?php

namespace App\Http\Controllers;

use PDF;

use Mail;
use Illuminate\Http\Request;


class ContactMessageController extends Controller
{
    public function create()
    {
        $report_message = '';
        return view('app.contact', compact('report_message'));
    }

    public function store(Request $request)
    {
        /*   $this->validate($request, [
            'fname' => 'required',
            'email' => 'required|email',
            'lname' => 'required',
            'message' => 'required',
            'record' => 'required'
        ]); */

        $data['message'] = $request->input("message");
        $data['fname'] = $request->input("fname");
        $data['email'] = $request->input("email");
        $data['record'] = $request->input("record");
        $data['lname'] = $request->input("lname");

        $pdf = PDF::loadView('emails.pdf_mail', $data);

        try {
            Mail::send('emails.contact-message', $data, function ($message) use ($data, $pdf) {
                $message->to('filuro.apt@gmail.com', 'Filuro Apt ')
                    ->subject("Photo Shoot INVOICE")
                    ->attachData($pdf->output(), "invoice.pdf");
            });
        } catch (JWTException $exception) {
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
            $this->statusdesc  =   "Error sending mail";
            $this->statuscode  =   "0";
        } else {

            $this->statusdesc  =   "Message sent Succesfully";
            $this->statuscode  =   "1";
        }
        return view('app.contact')->with('report_message', $this->statusdesc);
    }
}
