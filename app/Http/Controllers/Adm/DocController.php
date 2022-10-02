<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Doc;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DocController extends Controller
{
    /**
     * Список документов
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docs = Doc::all()->sortBy('id');
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Документы"]
        ];
        return view('backend.pages.doc.index', compact('docs', 'breadcrumbs'));
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
            ['link' => "/admin/doc", 'name' => "Документы"],
            ['name' => " Создать"]
        ];
        //создаем объект чтобы было что отправить в форму.
        // Она же форма редактирования, надо что то отправить.
        $doc = new Doc();
        return view('backend.pages.doc.edit', compact('breadcrumbs', 'doc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ], [
            'name.required' => 'Название должно быть заполнено!',
            'name.min' => 'Минимальная длина поля 3 символа!',
        ]);
        $doc = new Doc();

        $doc->name = $request->name;
        $doc->preamble_name = $request->preamble_name;
        $doc->nomer = $request->nomer;
        $doc->short_name = $request->short_name;
        $doc->text = $request->text;
        $doc->description = $request->description;
        $doc->annotation = $request->annotation;
        $doc->date_pod = $doc->setDateNull($request->date_pod);
        $doc->date_pub = $doc->setDateNull($request->date_pub);
        $doc->date_vst = $doc->setDateNull($request->date_vst);
        $doc->date_end_vst = $doc->setDateNull($request->date_end_vst);
        $doc->date_npub = $doc->setDateNull($request->date_npub);
        $doc->date_kpub = $doc->setDateNull($request->date_kpub);

        $doc->pub = ($request->has('pub')) ? '1' : '0';
        $doc->notify = ($request->has('notify')) ? 1 : 0;
        $doc->in_main = ($request->has('in_main')) ? 1 : 0;
        $doc->meta_disc = $request->meta_disc;
        //$doc->meta_title = $request->meta_title;

        $doc->save();

        if ($request->redirect == 'apply') {
            return redirect()->route('doc.edit', $doc->id)->with('success', 'Сохранено.');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('doc.index')->with('success', 'Сохранено.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Doc $doc
     * @return \Illuminate\Http\Response
     */
    public function show(Doc $doc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Doc $doc
     * @return \Illuminate\Http\Response
     */
    public function edit(Doc $doc)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['link' => "/admin/doc", 'name' => "Документы"],
            ['name' => " Редактирование"]
        ];

        $users = \Auth::user();
        return view('backend.pages.doc.edit', compact('doc', 'users', 'breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Doc $doc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doc $doc)
    {
        $request->validate([
            'name' => 'required|min:3'
        ], [
            'name.required' => 'Название должно быть заполнено!',
            'name.min' => 'Минимальная длина поля 3 символа!',
        ]);


        $doc->name = $request->name;
        $doc->preamble_name = $request->preamble_name;
        $doc->nomer = $request->nomer;
        $doc->short_name = $request->short_name;
        $doc->text = $request->text;
        $doc->description = $request->description;
        $doc->annotation = $request->annotation;
        $doc->date_pod = $doc->setDateNull($request->date_pod);
        $doc->date_pub = $doc->setDateNull($request->date_pub);
        $doc->date_vst = $doc->setDateNull($request->date_vst);
        $doc->date_end_vst = $doc->setDateNull($request->date_end_vst);
        $doc->date_npub = $doc->setDateNull($request->date_npub);
        $doc->date_kpub = $doc->setDateNull($request->date_kpub);

        $doc->pub = ($request->has('pub')) ? '1' : '0';
        $doc->notify = ($request->has('notify')) ? 1 : 0;
        $doc->in_main = ($request->has('in_main')) ? 1 : 0;
        $doc->meta_disc = $request->meta_disc;
        //$doc->meta_title = $request->meta_title;


        if ($request->delete_consultant) {
            $doc->text = preg_replace('/(<div[^>]*>\s*?\((?:абзац введен|в ред\.|введена|введен|пп\. .{3}+ в ред\.|п\. [0-9\.]+ в ред\.|п\. [0-9\.]+ введен) .+?\))\s*?<\/div>/si',
                '', $doc->text);
            $doc->text = preg_replace('/\s?-\s?Федеральный закон от (?:[^\.]*\.){2}.*?[\.;]/si', "", $doc->text);;
        }

        if ($request->delete_a) {
            $doc->text = preg_replace('/(?:\<a[^>]+\>\<span[^>]+\>)([^<]+)(?:\<\/span\>\<\/a\>)/i', '\\1', $doc->text);
        }

        if ($request->delete_probel) {
            $doc->text=  str_replace('&nbsp;', ' ', $doc->text);
            $doc->text = preg_replace("/  +/"," ",$doc->text);
        }


        $doc->save();

        if ($request->redirect == 'apply') {
            return redirect()->back()->with('success', 'Сохранено.');
        } elseif ($request->redirect == 'save') {
            return redirect()->route('doc.index')->with('success', 'Сохранено.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Doc $doc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doc $doc)
    {
        //
    }
}
