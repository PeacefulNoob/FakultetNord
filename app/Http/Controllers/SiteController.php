<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Storage;
use App\Site;


class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data =  Site::findOrFail($id);
        return view('admin.edit_site', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Site::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'mimes:mp4,mov,ogg,jpeg,png,jpg,svg'


        ]);
        $title =  $request->title;
        $description = $request->description;
      

        if ($request->hasFile('photo')) {
            //PHOTO
            //Get filename w extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            //Samo ime
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //samo extension
            $extension = $request->file('photo')->getclientOriginalExtension();
            //create new filename
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload image
            $path = $request->file('photo')->move(public_path('images'), $filenameToStore);
        } else {
            $filenameToStore = $data->photo;
        }


        DB::table('site')->where('id', $id)->update([
            'title' => $title,
            'description' => $description,
            'photo' => $filenameToStore

        ]);

        return redirect('/admin/ ')->with('success', 'Azuriranje uspesno');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
