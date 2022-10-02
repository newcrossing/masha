<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::info('Начало заполнения таблицы Posts ');
        foreach (Content::where('ShortName_Content', '')->get() as $content) {
            Post::create(
                    [
                            'id' => $content->id,
                            'user_id' => empty($content->IdUser_Content) ? 3000 : $content->IdUser_Content,
                            'lavel_id' => 2,
                            'name' => $content->Name_Content,
                            'text' => $content->Text_Content,
                            'active' => 1,
                            'hits' => $content->Hits_Content,
                            'notify' => 2,
                            'status' => 1,
                            'meta_description' => '',
                            'meta_title' => '',
                            'in_main' => 1,
                            'date_public' => $content->DateNPub_Content,
                    ]
            );
        }
        Log::info('Tаблицa Posts заполнена ');
    }
}
