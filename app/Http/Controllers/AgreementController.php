<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgreementController extends Controller
{
    public function index()
    {
        $agreement = DB::table('contents')->where('type', 'agreement')->first();
        return view('frontend.agreement.index', compact('agreement'));
    }

    public function contact()
    {
        $agreement = DB::table('contents')->where('type', 'contact')->first();
        return view('frontend.agreement.index', compact('agreement'));
    }

    public function help()
    {
        $agreement = DB::table('contents')->where('type', 'help')->first();
        return view('frontend.agreement.index', compact('agreement'));
    }


    public function privacy()
    {
        $agreement = DB::table('contents')->where('type', 'privacy')->first();
        return view('frontend.agreement.index', compact('agreement'));
    }

    public function public_offer()
    {
        $agreement = DB::table('contents')->where('type', 'public_offer')->first();
        return view('frontend.agreement.index', compact('agreement'));
    }

    public function security()
    {
        $agreement = DB::table('contents')->where('type', 'security')->first();
        return view('frontend.agreement.index', compact('agreement'));
    }
}
