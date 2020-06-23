<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Storage;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = DB::table('slider')->orderBy('id', 'desc')->get();
        return view('admin.all_sliders')->with('sliders', $sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'mimes:mp4,mov,ogg,jpeg,png,jpg,svg',

        ]);


        if ($request->hasFile('photo')) {

            //Get filename w extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            //Samo ime
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //samo extension
            $extension = $request->file('photo')->getclientOriginalExtension();
            //create new filename
            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            //Upload image
            $path = $request->file('photo')->move(public_path('images/sliders'), $filenameToStore);
        } else {

            $filenameToStore = "";
        }


        $description = $request->description;

        //Create slider
        $slider = new Slider;
        $slider->title = $request->input('title');
        $slider->description = $description;
        $slider->photo = $filenameToStore;

        $slider->save();

        return redirect('/admin/all_sliders ')->with('success', 'slider je kreiran');
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
        $data =  Slider::findOrFail($id);
        return view('admin.edit_slider', compact('data'));
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
        $data = Slider::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photo' => 'mimes:mp4,mov,ogg,jpeg,png,jpg,svg',
            /*    'isActive' => 'accepted' */

        ]);
        $title =  $request->title;
        $description = $request->description;
        if ($request->has('isActive')) {
            $isActive =  '1';
        } else {
            $isActive =  '0';
        }

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
            $path = $request->file('photo')->move(public_path('images/sliders'), $filenameToStore);
        } else {
            $filenameToStore = $data->photo;
        }


        DB::table('slider')->where('id', $id)->update([
            'title' => $title,
            'description' => $description,
            'isActive' => $isActive,
            'photo' => $filenameToStore

        ]);

        return redirect('/admin/all_sliders ')->with('success', 'Azuriranje uspesno');
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
