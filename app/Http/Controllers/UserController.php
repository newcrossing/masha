<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use \App\Models\Post;
use \App\Models\User;
use \App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Mail\ResetPassword;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function forgotPassword()
    {
        return view('frontend.auth.passwords.forgot-password');
    }

    /**
     * Форма ввода нового пароля и проверка токена
     * @param token
     * @return view
     */
    public function forgotPasswordValidate($token)
    {
        $user = User::where('token', $token)->where('is_verified', 0)->first();
        if ($user) {
            $email = $user->email;
            return view('frontend.auth.passwords.change-password', compact('email'));
        }
        return redirect()->route('forgot-password')->with('failed', 'Ошибка! Ссылка сброса пароля не верна.');
    }

    /**
     * Reset password
     * @param request
     * @return response
     */
    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            Activity::add('Сброс пароля. Указанный  e-mail отсутствует в базе.', 'error');
            return back()->with('failed', 'Указанный  e-mail отсутствует в базе.');
        }

        $token = Str::random(60);

        $user['token'] = $token;
        $user['is_verified'] = 0;
        $user->save();

        Mail::to($request->email)->send(new ResetPassword($user->name, $token, env('APP_URL')));

        if (Mail::failures() != 0) {
            Activity::add('Сброс пароля. ссылка для сброса пароля отправлена на указанный e-mail.');
            return back()->with('success', 'Отправлено! ссылка для сброса пароля отправлена на указанный e-mail.');
        }
        return back()->with('failed', 'Ошибка! Не смог отправить письмо.');
    }

    /**
     * Изменение пароля
     * @param request
     * @return response
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ], [
            'confirm_password.same' => 'Пароли должны совпадать!',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user['is_verified'] = 0;
            $user['token'] = null;
            $user['password'] = Hash::make($request->password);
            $user->save();

            Activity::add('Сброс пароля. Новый пароль сохранен. Выполните вход с новым паролем.');
            return redirect()->route('login')
                ->with('success', 'Выполнено! Новый пароль сохранен. Выполните вход с новым паролем.');
        }
        return redirect()->route('forgot-password')->with('failed', 'Failed! something went wrong');
    }

    public function index()
    {


    }
}
