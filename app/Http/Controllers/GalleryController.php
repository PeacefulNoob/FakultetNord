<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Http\Request;
use App\Album;
use Illuminate\Support\Facades\DB;
use Storage;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    // List Galleries
    public function index()
    {
        $albums = Album::with('Photos')->get();
        return view('albums.all_albums')->with('albums', $albums);
    }
    public function index2()
    {
        $albums = Album::with('Photos')->get();
        return view('app.galeries')->with('albums', $albums);
    }

    //show create form
    public function create()
    {
        return view('albums.create');
    }
    //store gallery
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'mimes:mp4,mov,ogg,jpeg,png,jpg,svg',
            'logo' => 'mimes:mp4,mov,ogg,jpeg,png,jpg,svg'

        ]);


        if ($request->hasFile('cover_image')) {

            //Get filename w extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Samo ime
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //samo extension
            $extension = $request->file('cover_image')->getclientOriginalExtension();
            //create new filename
            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            //Upload image
            $path = $request->file('cover_image')->move(public_path('images/cover_image'), $filenameToStore);
        } else {

            $filenameToStore = "";
        }
        if ($request->hasFile('logo')) {
            //logo
            //Get filename w extension
            $logo = $request->file('logo');

            $filenameWithExtl = $logo->getClientOriginalName();
            //Samo ime
            $filenamel = pathinfo($filenameWithExtl, PATHINFO_FILENAME);
            //samo extension
            $extensionl = $request->file('logo')->getclientOriginalExtension();
            //create new filename
            $filenameToStoreLogo = $filenamel . '_' . time() . '.' . $extensionl;
            //Upload image
            /*             $path = $request->file('logo')->move(public_path('images/cover_image/logos'), $filenameToStoreLogo);
 */
            //thumbnail
            $thumbnail = Image::make($logo->getRealPath())->fit(410, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $filenameToStoreLogo = 'logo_' . $filenameToStoreLogo;
            $thumbnail->save('images/cover_image/logos/' . $filenameToStoreLogo);
        } else {
            $filenameToStoreLogo = "null";
        }

        $description = $request->description;

        //Create album
        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $description;
        $album->cover_image = $filenameToStore;
        $album->logo_image = $filenameToStoreLogo;

        $album->save();

        return redirect('/admin/ ')->with('success', 'Album je kreiran');
    }
    public function show($id)
    {

        $album = Album::with('Photos')->find($id);

        return view('albums.show', compact('album'));
    }
    public function destroy($id)
    {
        $album = Album::find($id);

        if ($album->cover_image != 'noimage.jpg') {
            // Delete Image
            Storage::delete('/public/images/' . $album->cover_image);
        }
        $album->delete();
        return redirect()->back()->with('success', 'Album Removed');
    }
    public function edit($id)
    {
        $data = Album::findOrFail($id);
        return view('albums.edit_album', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $albums = DB::table('albums')->where('id', '=', $id)->get();
        $data = Album::findOrFail($id);
        $albumId = $id;
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'mimes:mp4,mov,ogg,jpeg,png,jpg,svg',
            'logo' => 'mimes:mp4,mov,ogg,jpeg,png,jpg,svg'


        ]);
        $name =  $request->name;
        $description = $request->description;
        //cover_image
        if ($request->hasFile('cover_image')) {
            //Get filename w extension
            $filenameWithExt1 = $request->file('cover_image')->getClientOriginalName();
            //Samo ime
            $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);
            //samo extension
            $extension1 = $request->file('cover_image')->getclientOriginalExtension();
            //create new filename
            $filenameToStore1 = $filename1 . '_' . time() . '.' . $extension1;
            //Upload cover_image
            $path = $request->file('cover_image')->move(public_path('images/cover_image'), $filenameToStore1);;
        } else {
            $filenameToStore1 = $data->cover_image;
        }
        if ($request->hasFile('logo')) {
            //logo
            //Get filename w extension
            $logo1 = $request->file('logo');

            $filenameWithExtl1 = $logo1->getClientOriginalName();
            //Samo ime
            $filenamel1 = pathinfo($filenameWithExtl1, PATHINFO_FILENAME);
            //samo extension
            $extensionl1 = $request->file('logo')->getclientOriginalExtension();
            //create new filename
            $filenameToStoreLogo1 = $filenamel1 . '_' . time() . '.' . $extensionl1;
            //Upload image

            //thumbnail
            $thumbnail1 = Image::make($logo1->getRealPath())->fit(410, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $filenameToStoreLogo1 = 'logo_' . $filenameToStoreLogo1;
            $thumbnail1->save('images/cover_image/logos/' . $filenameToStoreLogo1);
        } else {
            $filenameToStoreLogo1 = $data->logo_image;
        }

        DB::table('albums')->where('id', $albumId)->update([
            'name' => $name,
            'description' => $description,
            'cover_image' => $filenameToStore1,
            'logo_image' => $filenameToStoreLogo1
        ]);

        return redirect()->back()->with('success', 'Ažuriranje uspješno');
    }
}
