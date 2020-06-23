<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

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
}
