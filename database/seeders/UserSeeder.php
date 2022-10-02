<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User2;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::info('Начало заполнения таблицы Users ');
        foreach (User2::all() as $user2) {
            User::create(
                    [
                            'id' => $user2->id,
                            'name' => trim($user2->Name_User.' '.$user2->LastName_User),
                            'login' => $user2->Login_User,
                            'sex' => $user2->Pol_User,
                            'city' => (string)$user2->City_User,
                            'foto' => (string)$user2->Foto_User,
                            'about' => (string)$user2->OSebe_User,
                            'ip' => $user2->Ip_User,
                            'notify_vst' => (int)$user2->UvedVst_User,
                            'notify_edit' => (int)$user2->UvedEdit_User,
                            'notify_edit' => (int)$user2->UvedEdit_User,
                            'notify_doc' => (int)$user2->UvedDoc_User,
                            'rang' => (int)$user2->Rang_User,
                            'rating' => $user2->Rating_User,
                            'birthday' => $user2->DateRog_User,
                            'last_visit' => $user2->DateTimeLastVisit_User,
                            'email' => $user2->Email_User,
                            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                            'remember_token' => Str::random(10),
                            'active' => 1,
                    ]
            );
        }
       // Log::info('Tаблицa Users заполнена ');
    }
}
