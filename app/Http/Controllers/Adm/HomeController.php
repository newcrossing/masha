<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use function React\Promise\all;

class HomeController extends Controller
{
    public function index()
    {
        return view('backend.pages.home.index');
    }
}
