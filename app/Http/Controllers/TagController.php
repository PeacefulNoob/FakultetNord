<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function show($id)
    {
        $tags = Tag::findOrFail($id);

        return view('tags.show' , compact("tags", "tags"));
    }
    public function create()
    {
        $posts = DB::table('posts')->orderBy('created_at', 'desc')->get();
        $tags = DB::table('tags')->orderBy('id', 'desc')->get();


        return view('tags.post_tag' , compact("posts", "tags"));
    }

    public function store(Request $request)
    {
        dd($request);
        $this->validate($request, [
            'post_id' => 'required',
            'tag_id' => 'required'
        ]);

      
        // Create Post
        $post_tag = new Post;
        $post_tag->tag_id = $request->input('tag_id');
        $post_tag->post_id = $request->input('post_id');
   
        $post->save();

        return redirect('')->with('success', 'Tag Connected');
    }
}
