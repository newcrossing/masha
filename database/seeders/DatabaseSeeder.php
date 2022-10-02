<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Log::info('Начало заполнения');

        // таблица Tags
       // $this->call(TagSeeder::class);

        // таблица Tags
       // $this->call(UserSeeder::class);

        // таблица Posts
       // $this->call(PostSeeder::class);
        //Lavel::factory()->count(10)->create();


        $this->call(DocSeeder::class);

    }
}
