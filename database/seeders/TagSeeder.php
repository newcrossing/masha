<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Tag2;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::info('Начало заполнения таблицы Tags ');

        foreach (Tag2::all() as $tag2) {
            Tag::create(
                    [
                            'id' => $tag2->id,
                            'name' => $tag2->Name_Tag,
                            'hits' => $tag2->Hits_Tag,
                            'active' => 1,
                    ]
            );
        }
        Log::info('Tаблицa Tags заполнена ');
    }
}
