<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\Doc;
use App\Models\Izm;
use App\Models\Text;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::info('Начало заполнения таблицы Doc ');
        foreach (Content::where('ShortName_Content', '<>', '')->get() as $content) {
            Doc::create([
                    'id' => $content->id,
                    'lavel_id' => 1,
                    'preamble_name' => $content->PreambleName_Content,
                    'short_name' => $content->ShortName_Content,
                    'name' => $content->Name_Content,
                    'number' => $content->Nomer_Content,
                    'annotation' => $content->Annotation_Content,
                    'date_sign' => ($content->DatePod_Content == '0000-00-00') ? null : $content->DatePod_Content,
                    'date_public' => ($content->DatePub_Content == '0000-00-00') ? null : $content->DatePub_Content,
                    'date_effective' => ($content->DateVst_Content == '0000-00-00') ? null : $content->DateVst_Content,
                    'date_end_effective' => ($content->DateEndVst_Content == '0000-00-00') ? null : $content->DateEndVst_Content,
                    'date_published' => ($content->DateNPub_Content == '0000-00-00') ? null : $content->DateNPub_Content,
                    'date_end_published' => ($content->DateKPub_Content == '0000-00-00') ? null : $content->DateKPub_Content,
                    'active' => $content->Pub_Content,
                    'meta_description' => $content->MetaDisc_Content,
                    'meta_title' => $content->MetaTitle_Content,
                    'hits' => $content->Hits_Content,
                    'downloads' => $content->NumDownload_Content,
                    'notify' => 0,
                    'in_main' => 0,
            ]);

            Text::create(
                    [
                            'doc_id' => $content->id,
                            'text' => $content->Text_Content,
                    ]);
        }

        foreach (Izm::all() as $content) {
            Text::create([
                    'doc_id' => $content->IdDocOld_Izm,
                    'edit_id' => $content->IdDocNew_Izm,
                    'text' => $content->Text_Izm,
            ]);
        }

        Log::info('Tаблицa Docs  заполнена ');
    }
}
