<?php

namespace Database\Factories;

use App\Models\Content;
use App\Models\Post;
use App\Models\User;
use App\Models\User2;
use Illuminate\Database\Eloquent\Factories\Factory;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        foreach (Content::where('ShortName_Content', '')->get() as $content) {

            Post::create(
                    [
                            'user_id' => $content->IdUser_Content,
                            'name' =>$content->Name_Content,
                           // 'text' => $content->Text_Content,
                            'text' => 'вап',
                            'active' => 1,
                            'hits' => $content->Hits_Content,
                            'notify' => 2,
                            'status' => 1,
                            'meta_description' => '',
                            'meta_title' => $content->Name_Content,
                            'in_main' => 1,
                            'date_public' => $content->DateNPub_Content,
                            'date_public' => $content->DateNPub_Content,
                    ]
            );
           // Log::notice('fghg');
        }
        return [
        ];
    }
}
