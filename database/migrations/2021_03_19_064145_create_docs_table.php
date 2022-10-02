<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lavel_id')->unsigned()->comment('id категории');
            $table->text('preamble_name')->comment('Чей документ');
            $table->text('short_name')->comment('короткое название');
            $table->text('name')->comment('название - обязательное поле');
            $table->string('number', 10)->default('')->comment('номер документа');

            $table->string('annotation', 255)->default('')->comment('аннотация');
            //$table->longText('text')->nullable()->comment('текст');

            $table->date('date_sign')->nullable()->default(null)->comment('Дата подписания');
            $table->date('date_public')->nullable()->default(null)->comment('Дата публикации ');
            $table->date('date_effective')->nullable()->default(null)->comment('Дата вступления в силу');
            $table->date('date_end_effective')->nullable()->default(null)->comment('Дата окончания действия');
            $table->date('date_published')->nullable()->default(null)->comment('Дата начала публикации');
            $table->date('date_end_published')->nullable()->default(null)->comment('Дата окончания публикации');

            $table->boolean('active')->default(1)->comment('публикация ');

            $table->string('meta_description', 255)->default('');
            $table->string('meta_title', 255)->default('');
            $table->integer('hits')->default(0);
            $table->integer('downloads')->default(0);

            $table->tinyInteger('notify')->default(0); // уведомление. 0 - не требуется . 1 - требуется . 2 - уведомлено
            $table->boolean('in_main')->default('0'); // на главную страницу

            $table->softDeletes(); // мягкое удаление
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
        Schema::dropIfExists('docs');
    }
}
