<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaggablesTable extends Migration {
    /**
     * Run the migrations.
     * Таблица полиморфной связи тегов с Постами или Документами
     *
     * @return void
     */
    public function up() {
        Schema::create('taggables', function(Blueprint $table) {
            $table->id();
            $table->bigInteger('tag_id')->unsigned(); // id тега
            $table->bigInteger('taggable_id')->unsigned(); // id контента
            $table->string('taggable_type'); // id контента
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('taggables');
    }
}
