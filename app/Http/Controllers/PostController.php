<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function test()
    {
        $post = Post::find(1);
        $tag = Tag::find([3, 5]);
        $post->tags()->sync($tag);
    }

    public function index()
    {
        $posts = Post::where('active', 1)
            ->orderBy('date_public', 'desc')
            ->paginate(10);

        $tags = Tag::where('active', 1)->orderByDesc('hits')->limit(10)->get();

        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
        ];

        return view('frontend_old.post.list', compact('posts', 'tags', 'breadcrumbs'));
    }


    public function list()
    {
        $posts = Post::where('active', 1)
            ->orderBy('date_public', 'desc')
            ->paginate(10);

        $tags = Tag::where('active', 1)->orderByDesc('hits')->limit(10)->get();

        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Статьи"],

        ];

        return view('frontend_old.post.list', compact('posts', 'tags', 'breadcrumbs'));
    }


    public function single($id)
    {
        $post = Post::findOrFail($id);

        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/post", 'name' => " Статьи"],
            ['name' => $post->name],
        ];
        $tags = Tag::where('active', 1)->orderByDesc('hits')->limit(10)->get();

        \Carbon\Carbon::setLocale('ru');

        return view(
            'frontend_old.post.single',
            [
                'post' => $post,
                'listTags' => $tags,
                'breadcrumbs' => $breadcrumbs
            ]
        );
    }
}
