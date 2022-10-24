<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\Social;
use Illuminate\Http\Request;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $points = Point::all()->sortBy('id');
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => "Точки продаж"]
        ];
        return view('backend.pages.point.index', compact('points', 'breadcrumbs'));
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
            ['link' => "/admin/social", 'name' => "Точки продаж"],
            ['name' => "Новая"]
        ];
        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.
        $point = new Point();
        return view('backend.pages.point.edit', compact('breadcrumbs', 'point'));
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
            return redirect()->route('point.index');
        }

        $request->validate([
            'address' => 'required|max:30|min:3',
            'link' => 'required|max:30|min:3',
        ]);
        $point = new Point();

        $request['active'] = $request['active'] ? '1' : null;

        $point->fill($request->all());
        $point->save();

        if ($request->redirect == 'apply') {
            return redirect()->route('point.edit', $point->id)->with('success', 'Сохранено');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('point.index')->with('success', 'Сохранено');
        } elseif ($request->redirect == 'saveadd') {
            return redirect()->route('point.create')->with('success', 'Сохранено');
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
    public function edit(Point $point)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/social", 'name' => "Точки продаж"],
            ['name' => " Изменить"]
        ];

        return view('backend.pages.point.edit', compact('point', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Point $point)
    {
        if ($request->redirect == 'cancel') {
            return redirect()->route('point.index');
        }

        $request['active'] = $request['active'] ? '1' : null;

        $point->fill($request->all());
        $point->save();

        if ($request->redirect == 'apply') {
            return redirect()->back()->with('success', 'Сохранено');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('point.index')->with('success', 'Сохранено');
        } elseif ($request->redirect == 'saveadd') {
            return redirect()->route('point.create');
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
