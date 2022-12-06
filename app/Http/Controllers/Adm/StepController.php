<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Step;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class StepController extends Controller

{
    private $name = 'Алгоритм';

    public function index()
    {
        $steps = Step::all()->sortBy('number');
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Алгоритм "]
        ];
        return view('backend.pages.step.index', compact('steps', 'breadcrumbs'));
    }


    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/social", 'name' => $this->name],
            ['name' => " Новая"]
        ];
        // Создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что-то отправить.
        $step = new Step();
        return view('backend.pages.step.edit', compact('breadcrumbs', 'step'));
    }


    public function store(Request $request)
    {
        if ($request->redirect == 'cancel') {
            return redirect()->route('step.index');
        }

        $request->validate([
            'number' => 'required',
            'name' => 'required|min:3',
        ]);

        $step = new Step();

        if ($request->hasFile('image')) {
            $newFileName = time() . '.' . $request['image']->extension();
            Image::make($request['image'])->widen(650)->save(Storage::path('/public/steps/') . $newFileName);
            $step->image = $newFileName;
        }
        $request['active'] = $request['active'] ? '1' : null;

        $step->fill($request->all());
        $step->save();
        if ($request->hasFile('image')) {
            $step->image = $newFileName;
            $step->save();
        }

        if ($request->redirect == 'apply') {
            return redirect()->route('step.edit', $step->id)->with('success', 'Сохранено');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('step.index')->with('success', 'Сохранено');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit(Step $step)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/step", 'name' => "Алгоритм"],
            ['name' => " Изменить"]
        ];

        return view('backend.pages.step.edit', compact('step', 'breadcrumbs'));
    }


    public function update(Request $request, Step $step)
    {
        if ($request->redirect == 'cancel') {
            return redirect()->route('step.index');
        }
        if ($request->redirect == 'delete') {
            $step->delete();
            return redirect()->route('step.index')->with('success', 'Удалено');
        }

        //сброс фото
        if ($request->reset_foto) {
            $step->image = null;
            $step->save();
            return redirect()->back()->with('success', 'Сохранено');
        }

        if ($request->hasFile('image')) {
            $newFileName = time() . '.' . $request['image']->extension();
            Image::make($request['image'])->widen(650)->save(Storage::path('/public/steps/') . $newFileName);
            $request['image'] = $newFileName;
            $path = $request->image->store('images');

        }
//return $request;
        $request['active'] = $request['active'] ? '1' : null;

        $step->fill($request->all());
        $step->save();
        if ($request->hasFile('image')) {
            $step->image = $newFileName;
           $step->save();
        }

        if ($request->redirect == 'apply') {
            return redirect()->back()->with('success', 'Сохранено');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('step.index')->with('success', 'Сохранено');
        }
    }


    public function destroy($id)
    {
        //
    }
}
