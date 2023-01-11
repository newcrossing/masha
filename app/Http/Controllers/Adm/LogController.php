<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function list()
    {
        $users = User::all()->sortBy('login');
        $logs = Activity::limit(1000)->orderByDesc('created_at')->get();
        $breadcrumbs = [
            ['link' => "/", 'name' => "Главная"],
            ['name' => " Действия пользователя"]
        ];
        return view('backend.pages.log.list', compact('logs', 'users', 'breadcrumbs'));
    }
}
