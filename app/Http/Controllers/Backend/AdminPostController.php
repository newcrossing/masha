<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;

class AdminPostController extends Controller
{


    public function index()
    {
        $posts = Post::all()
            ->sortDesc()
            ;
        return view('backend.pages.post.index', compact('posts'));
    }


}
