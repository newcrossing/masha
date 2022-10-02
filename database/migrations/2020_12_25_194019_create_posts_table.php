<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('lavel_id')->unsigned();
            $table->text('name')->comment('Название статьи');
            $table->longText('text');
            $table->integer('active')->default('1')->nullable();
            $table->integer('hits')->default('0')->nullable();
            $table->tinyInteger('notify')->default(0); // уведомление. 0 - не требуется . 1 - требуется . 2 - уведомлено
            $table->tinyInteger('status')->default(0); // статус редактирования. 0 - черновик . 1 - готово
            $table->string('meta_description',255)->default('');
            $table->string('meta_title',255)->default('');
            $table->integer('in_main')->default('0'); // на главную страницу
            $table->date('date_public')->nullable()->default(NULL);
            $table->softDeletes(); // мягкое удаление
            $table->timestamps();

           // $table->foreign('user_id')
            //    ->references('id')->on('users')
            //    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}