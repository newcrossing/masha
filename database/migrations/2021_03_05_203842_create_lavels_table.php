<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLavelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lavels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->nullable()->comment('родитель  ');
            $table->string('name',255)->comment('Название раздела');
            $table->text('description')->comment('Описание раздела');
            $table->bigInteger('position')->nullable()->comment('Позиция ');
            $table->integer('active')->default('1');
            $table->string('meta_description',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lavels');
    }
}
