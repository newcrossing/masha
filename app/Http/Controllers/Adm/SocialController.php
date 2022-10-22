<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::all()->sortBy('id');
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Социальные сети"]
        ];
        return view('backend.pages.social.index', compact('socials', 'breadcrumbs'));
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
            ['link' => "/admin/social", 'name' => "Соц сети"],
            ['name' => " Новая"]
        ];
        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.
        $social = new Social();
        return view('backend.pages.social.edit', compact('breadcrumbs', 'social'));
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
            return redirect()->route('social.index');
        }

        $request->validate([
            'name' => 'required|max:30|min:3',
            'link' => 'required|max:30|min:3',
            'ico' => 'required|max:30|min:3',
        ]);
        $social = new Social();

        $request['active'] = $request['active'] ? '1' : null;

        $social->fill($request->all());
        $social->save();

        if ($request->redirect == 'apply') {
            return redirect()->route('social.edit', $social->id)->with('success', 'Сохранено');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('social.index')->with('success', 'Сохранено');
        } elseif ($request->redirect == 'saveadd') {
            return redirect()->route('social.create')->with('success', 'Сохранено');
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
    public function edit(Social $social)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/social", 'name' => "Соц сети"],
            ['name' => " Изменить"]
        ];

        return view('backend.pages.social.edit', compact('social', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
    {
        if ($request->redirect == 'cancel') {
            return redirect()->route('social.index');
        }

        $request['active'] = $request['active'] ? '1' : null;

        $social->fill($request->all());
        $social->save();

        if ($request->redirect == 'apply') {
            return redirect()->back()->with('success', 'Сохранено');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('social.index')->with('success', 'Сохранено');
        } elseif ($request->redirect == 'saveadd') {
            return redirect()->route('social.create');
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
