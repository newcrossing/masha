<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function show($slug)
    {
        // ищем нужную страницу
        $content = Content::where('slug', $slug)->firstOrFail();
        return view('frontend.content.index', compact('content'));

    }
}
