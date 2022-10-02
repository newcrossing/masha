<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Список стаей
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortBy('name');
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Статьи"]
        ];
        return view('backend.pages.post.index2', compact('posts', 'breadcrumbs'));
    }

    /**
     * Показать форму для создания статьи
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/post", 'name' => "Статьи"],
            ['name' => " Новая статья"]
        ];
        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.
        $post = new Post();
        return view('backend.pages.post.edit', compact('breadcrumbs', 'post'));
    }

    /**
     * Сохраняем посты
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:3'
        ], [
            'name.required' => 'Название должно быть заполнено!',
            'name.min' => 'Минимальная длина поля 3 символа!',
            'name.max' => 'Максимальная длина поля 255 символов!',
        ]);

        $post = new Post();
        $post->name = $request->name;
        $post->text = $request->text;
        $post->active = ($request->has('active')) ? 1 : 0;
        $post->user_id = 1000;
        $post->lavel_id = 2;
        $post->date_public = \Carbon\Carbon::createFromFormat('d/m/Y', $request->date_public)->format('Y-m-d');

        $post->meta_description = $request->meta_description;
        $post->meta_title = $request->meta_title;

        $post->save();

        //Log::info('Дата ' . $post->date_public);
        if ($request->redirect == 'apply') {
            return redirect()->route('post.edit', $post->id)->with('success', 'Статья добавлена.');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('post.index')->with('success', 'Статья добавлена.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/post", 'name' => "Статьи"],
            ['name' => " Редактирование"]
        ];

        $users = User::all();
        return view('backend.pages.post.edit', compact('post', 'users', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|max:255|min:3'
        ], [
            'name.required' => 'Название должно быть заполнено!',
            'name.min' => 'Минимальная длина поля 3 символа!',
        ]);

        $post->name = $request->name;
        $post->text = $request->text;
        $post->date_public = \Carbon\Carbon::createFromFormat('d/m/Y', $request->date_public)->format('Y-m-d');
        $post->active = ($request->has('active')) ? 1 : 0;
        $post->notify = ($request->has('notify')) ? 1 : 0;
        $post->in_main = ($request->has('in_main')) ? 1 : 0;
        $post->meta_description = $request->meta_description;
        $post->meta_title = $request->meta_title;

        $post->save();

        if ($request->redirect == 'apply') {
            return redirect()->back()->with('success', 'Статья изменена.');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('post.index')->with('success', 'Статья изменена.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('success', 'Статья удалена.');
    }

    /**
     * Получить сообщения об ошибках для определенных правил валидации.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Название должно быть заполнено.',
        ];
    }
}
