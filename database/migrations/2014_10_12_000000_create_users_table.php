<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');;
            $table->string('login')->default('default');
            $table->string('email')->unique();
            $table->string('sex')->default('1');
            $table->string('city')->default('');
            $table->string('foto')->default('');
            $table->boolean('is_admin')->default(0);
            $table->text('about')->nullable();
            $table->ipAddress('ip')->default('');
            $table->tinyInteger('notify_vst')->default(1);
            $table->tinyInteger('notify_edit')->default(1);
            $table->tinyInteger('notify_doc')->default(1);
            $table->integer('rang')->default(0);
            $table->float('rating')->default(0);
            $table->date('birthday')->nullable()->default(NULL);
            $table->dateTime('last_visit')->nullable()->default(NULL);
            $table->string('active')->default('1')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
