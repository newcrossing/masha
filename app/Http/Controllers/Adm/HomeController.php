<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use function React\Promise\all;

class HomeController extends Controller
{
    public function index()
    {
        $breadcrumbs = [


        ];
        $users = DB::table('users')->count();
        $users_chek = DB::table('users')->whereNotNull('tel')->count();
        $users_no_chek = DB::table('users')->whereNull('tel')->count();

        $logs = Activity::limit(1000)->orderByDesc('created_at')->get();

        return view('backend.pages.home.index',
            compact(
                'breadcrumbs',
                'users',
                'users_chek',
                'users_no_chek',
                'logs',

            )
        );
    }
}
