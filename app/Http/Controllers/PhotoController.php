<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Photo;
use App\Album;
use Illuminate\Support\Facades\DB;
use FFMpeg;
use Storage;
use App\Site;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = DB::table('photos')->orderBy('views', 'desc')->get();
        $albums = Album::with('Photos')->get();
        $site = DB::table('site')->first();
        $sliders = DB::table('slider')->orderBy('id', 'desc')->get();
        return view('app.index', compact("photos", "albums", "site", "sliders"));
    }
    public function index1($id)
    {

        $photos = DB::table('photos')->where('album_id', $id)->get();
        $album = Album::findOrFail($id);

        return view('app.gallery_media', compact("photos", "album"));
    }
    public function upload()
    {
        $albums = Album::all();

        return view('photos.upload_p', compact("albums"));
    }


    //store phooto
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'photo' => 'mimes:mp4,mov,ogg,jpeg,png,jpg,svg',
            'thumbnail' => 'mimes:mp4,mov,ogg,jpeg,png,jpg,svg'

        ]);
        $url = $request->input('url');
        $description = $request->input('description');


        if ($request->hasFile('photo')) {
            //PHOTO
            //Get filename w extension
            $photo = $request->file('photo');
            $filenameWithExt = $photo->getClientOriginalName();
            //Samo ime
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //samo extension
            $extension = $request->file('photo')->getclientOriginalExtension();
            //create new filename
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            //Upload image

            //thumbnail
            $thumbnail = Image::make($photo->getRealPath())->fit(410, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $ThfilenameToStore = 'TH' . $filenameToStore;
            $thumbnail->save('images/thumbnail/' . $ThfilenameToStore);

            //slika
            $path = $request->file('photo')->move(public_path('images'), $filenameToStore);
        } else {
            $filenameToStore = "null";
            $extension = "yt";
            $ThfilenameToStore = "https://img.youtube.com/vi/" . $url . "/maxresdefault.jpg";
        }

        /* if($extension =='mp4'){
 $getID3 = new \getID3;
$file = $getID3->analyze($path);
$duration = date('I:s', $file['playtime_seconds']);
} else {
    $duration='00:00';
}
 */



        //Create photo
        $photo = new Photo;
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $description;
        $photo->size = 200;
        $photo->media_type = $extension;
        $photo->location = $request->input('location');
        $photo->photo = $filenameToStore;
        $photo->thumbnail = $ThfilenameToStore;
        $photo->user_id = auth()->user()->id;
        $photo->url = $url;
        $photo->save();
        //vraca error
        return redirect('/admin/ ')->with('success', 'Media uspesno kreirana');
    }


    public function edit($id)
    {
        $data = Photo::findOrFail($id);
        $albums = Album::all();
        return view('photos.edit_photo', compact('data', 'albums'));
    }

    public function update(Request $request, $id)
    {

        $photos = DB::table('photos')->where('id', '=', $id)->get();
        $data = Photo::findOrFail($id);
        $photoId = $id;
        $request->validate([
            'title' => 'required',
            'location' => 'required',
            'thumbnail' => 'mimes:mp4,mov,ogg,jpeg,png,jpg,svg',
            'photo' => 'mimes:mp4,mov,ogg,jpeg,png,jpg,svg'


        ]);
        $album =  $request->album_id;
        $title =  $request->title;
        $location = $request->location;
        $url = $request->url;
        //THUMBNAIL
        $ex = $data->media_type;

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
            $extension = $data->media_type;
        }

        if ($request->hasFile('thumbnail')) {
            //Get filename w extension
            $filenameWithExt1 = $request->file('thumbnail')->getClientOriginalName();
            //Samo ime
            $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);
            //samo extension
            $extension1 = $request->file('thumbnail')->getclientOriginalExtension();
            //create new filename
            $filenameToStore1 = $filename1 . '_' . time() . '.' . $extension1;
            //Upload thumbnail
            $path = $request->file('thumbnail')->move(public_path('images/thumbnail'), $filenameToStore1);;
        } else {
            $filenameToStore1 = $data->thumbnail;
        }

        if ($ex == 'yt') {
            $thumbnail = "https://img.youtube.com/vi/" . $url . "/maxresdefault.jpg";
            $filenameToStore1 = $thumbnail;
        }
        DB::table('photos')->where('id', $photoId)->update([
            'title' => $title,
            'location' => $location,
            'url' => $url,
            'thumbnail' => $filenameToStore1,
            'photo' => $filenameToStore,
            'media_type' => $extension,
            'album_id' => $album
        ]);

        return redirect('/admin/ ')->with('success', 'Azuriranje uspesno');
    }

    public function destroy($id)
    {
        $photo = Photo::find($id);
        if ($photo->photo != 'noimage.jpg') {
            // Delete Image
            Storage::delete('/public/images/' . $photo->photo);
        }
        $photo->delete();
        return redirect('/admin/ ')->with('success', 'Uspesno obrisana slika');
    }


    public function views(Request $request)
    {
        $photo = Photo::findOrFail($request->id);
        DB::table('photos')->where('id', $photo->id)->increment('views');
    }
    public function video_world()
    {
        $photos = DB::table('photos')->orderBy('created_at', 'desc')->get();
        $albums = Album::with('Photos')->get();
        return view('app.video_world', compact("photos", "albums"));
    }
}
