<?php

namespace App\Http\Controllers;

use \App\Models\Post;
use \App\Models\User;
use \App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{




    public function index()
    {

       // $users = DB::table('content')->where('Id_Content', '129')->first();
       // $users = DB::table('content')->where('Id_Content', '129')->first();
      // $users = \App\Models\User::find(100);
       // $user= new Test;

     //  $users =  Post::find(1)->user()
      //     ->where('', 'foo')
        //   ->first();;

      //  $users =  User::find(10);
       // $users = $users2->post;

        //$user->text = '456848';

       // $user->save();


        //$posts =User::find(10)->posts;
        $posts =Post::find(10)->user;
        //$posts = $posts2->posts;





        return view('main.index', ['posts' => $posts]);
       // return view('layouts.app');
    }
}
