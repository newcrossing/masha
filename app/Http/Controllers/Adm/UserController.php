<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->sortBy('login');
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Пользователи"]
        ];
        return view('backend.pages.user.index', compact('users', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/user", 'name' => "Пользователи"],
            ['name' => " Новый пользователь"]
        ];
        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.


        $user = new User();
        return view('backend.pages.user.edit', compact('breadcrumbs', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->redirect == 'cancel') {
            return redirect()->route('user.index');
        }

        $request->validate([
            'login' => 'required|string|max:255|min:3|regex:/^[a-z]+$/i|unique:users',
            'password' => 'required|max:30|min:3',
        ], [
            'login.unique' => 'Поле ЛОГИН должно быть уникально!',
            'login.required' => 'Поле ЛОГИН обязательно!',
            'login.min' => 'Минимальная длина поля 3 символа!',
            'login.max' => 'Максимальная длина поля 255 символов!',
            'password.min' => 'Минимальная длина пароля 3 символа!',
            'password.max' => 'Максимальная длина пароля 30 символов!',
        ]);
        $user = new User();

        if ($request->hasFile('image')) {
            $newFileName = time() . '.' . $request['image']->extension();
            Image::make($request['image'])->widen(300)->save(Storage::path('/public/avatars/300/') . $newFileName);
            Image::make($request['image'])->widen(100)->save(Storage::path('/public/avatars/50/') . $newFileName);
            $user->foto = $newFileName;
        }
        $user->login = $request->login;
        $user->password = Hash::make($request->password);
        $user->name = ($request->name) ?: $user->login;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->notify_email = $request->boolean('notify_email');
        $user->notify_tel = $request->boolean('notify_tel');
        $user->notify_whatsup = $request->boolean('notify_whatsup');
        $user->notify_telegram = $request->boolean('notify_telegram');
        $user->save();
        $user->board()->create([
            'name' => 'Название вашего объявления',
            'active' => 1,
            'slug' => Str::lower(Str::random(5)) . '-' . time(),
            'user_id' => $user->id
        ]);


        if ($request->redirect == 'apply') {
            return redirect()->route('user.edit', $user->id)->with('success', 'Сохранено');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('user.index')->with('success', 'Сохранено');
        } elseif ($request->redirect == 'saveadd') {
            return redirect()->route('user.create')->with('success', 'Сохранено');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/user", 'name' => "Пользователи"],
            ['name' => " Изменить пользователь"]
        ];

        return view('backend.pages.user.edit', compact('user', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->redirect == 'cancel') {
            return redirect()->route('user.index');
        }

        //сброс фото
        if ($request->reset_foto) {
            $user->foto = null;
            $user->save();
            return redirect()->back()->with('success', 'Сохранено');
        }

        if ($request->hasFile('image')) {
            $newFileName = time() . '.' . $request['image']->extension();
            Image::make($request['image'])->widen(300)->save(Storage::path('/public/avatars/300/') . $newFileName);
            Image::make($request['image'])->widen(100)->save(Storage::path('/public/avatars/50/') . $newFileName);
            $user->foto = $newFileName;
        }
        $user->login = $request->login;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->tel = $request->tel;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->notify_email = $request->boolean('notify_email');
        $user->notify_tel = $request->boolean('notify_tel');
        $user->notify_whatsup = $request->boolean('notify_whatsup');
        $user->notify_telegram = $request->boolean('notify_telegram');
        $user->save();

        if ($request->redirect == 'apply') {
            return redirect()->back()->with('success', 'Сохранено');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('user.index')->with('success', 'Сохранено');
        } elseif ($request->redirect == 'saveadd') {
            return redirect()->route('user.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
