<?php

namespace App\Http\Controllers;

use \App\Models\User;
use \App\Models\Test;
use \App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function index()
    {
        $posts = DB::table('content')->where('Id_Content', '129')->first();
       // $user= new Test;



        //$user->text = '456848';

       // $user->save();
        return view('main.index', ['users' => $users]);
       // return view('layouts.app');
    }
}
