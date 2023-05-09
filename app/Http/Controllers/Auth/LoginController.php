<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Activity;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        // todoo реализовать проверку чекбоксов на сервере
        $request->validate([
            'login' => 'required|min:3',
            'password' => 'required|max:50|min:6',
            'check' => 'required',
        ], [
            'login.min' => 'Минимальная длина логина 6 символов',
            'password.min' => 'Минимальная длина пароля 6 символов',
            'password.max' => 'Максимальная длина пароля 50 символов!',
            'check.required' => 'Согласие с условиями обязательно',
        ]);

        $credentials = $request->only('login', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            Activity::add('Авторизация на сайте');

            if (Auth::user()->email && Auth::user()->last_password) {
                return redirect()->intended('/board/edit/');
            } else {
                return redirect()->intended('/profile/settings/');
            }
        }
        Activity::add('Авторизации на сайте. Неверные данные.', 'error');
        return back()->withErrors([
            'email' => 'Неверный логин или пароль.',
        ]);
    }


    /**
     * Разлогиниться
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Activity::add('Вышел из сайта');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/');
    }

}
