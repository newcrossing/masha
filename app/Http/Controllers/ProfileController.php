<?php

namespace App\Http\Controllers;

use App\Helpers\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use LaravelQRCode\Facades\QRCode;

class ProfileController extends Controller
{
    /** Отрисовывает форму настроек пользователя
     *
     */
    public function settings()
    {
        // если нет файла qr надо создать
        if (!Storage::exists('/public/qr/' . Auth::user()->login . '.png')) {
            QRCode::url(env('APP_URL') . '/' . Auth::user()->board->slug)
                ->setSize(10)
                ->setOutfile(Storage::path('/public/qr/') . Auth::user()->login . '.png')
                ->setMargin(1)
                ->png();
        }
        return view('frontend.profile.settings');
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);


        $request->validate([
            'email' => 'sometimes|nullable|email:rfc,dns',
            'name' => 'required|string|max:50|min:2',
            'tel' => 'sometimes|nullable|regex:/^(\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2})$/',
            'tel2' => 'sometimes|nullable|regex:/^(\+7\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2})$/',
            'password' => 'nullable|confirmed|min:6',
            'image' => 'image|max:2000|mimes:jpeg,png,bmp',
        ], [
            'email.email' => 'Поле EMAIL не соответствует действительности!',
            'password.confirmed' => 'Пароли должны совпадать!',
            'password.min' => 'Минимальная длина пароля 6 символов!',
            'image.max' => 'Максимальный размер фотографии 2 Мб!',
        ]);
        $data = $request->all();

        // сохраняем фото при наличии
        if ($request->hasFile('image')) {
            $newFileName = time() . '.' . $data['image']->extension();
            Image::make($data['image'])->widen(300)->save(Storage::path('/public/avatars/300/') . $newFileName);
            Image::make($data['image'])->widen(100)->save(Storage::path('/public/avatars/50/') . $newFileName);
            $user->foto = $newFileName;
        }
        if ($request->last_password) {
            $user->last_password = 1;
            Activity::add('Установил чекбокс "Оставить старый пароль"');
        }

        if ($request->password && $request->password_confirmation && ($request->password_confirmation == $request->password)) {
            $user->password = Hash::make($request->password);
            $user->last_password = 2;
            Activity::add('Изменил пароль');
        }
        $user->name = $request->name;
        $user->city = $request->city;
        $user->instagram = $request->instagram;
        $user->vk = $request->vk;
        $user->tel = !empty(Str::remove(['(', ')', '-', ' '], $request->tel)) ? Str::remove(['(', ')', '-', ' '], $request->tel) : null;
        $user->tel2 = !empty(Str::remove(['(', ')', '-', ' '], $request->tel2)) ? Str::remove(['(', ')', '-', ' '], $request->tel2) : null;
        $user->tel_alert = !empty(Str::remove(['(', ')', '-', ' '], $request->tel_alert)) ? Str::remove(['(', ')', '-', ' '], $request->tel_alert) : null;
        $user->email = $request->email;
        $user->notify_email = $request->boolean('notify_email');
        $user->notify_tel = $request->boolean('notify_tel');
        $user->notify_sms = $request->boolean('notify_sms');
        $user->notify_whatsup = $request->boolean('notify_whatsup');
        $user->notify_telegram = $request->boolean('notify_telegram');
        $user->save();
        Activity::add('Пользователь изменил профиль');

        return redirect()->back()->with('success', 'Сохранено');
    }
}
