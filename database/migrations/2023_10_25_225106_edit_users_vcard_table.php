<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditUsersVcardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('telegram', 255)->nullable()->after('vk');
            $table->string('tiktok', 255)->nullable()->after('vk');
            $table->string('youtube', 255)->nullable()->after('vk');
            $table->string('odnoklassniki', 255)->nullable()->after('vk');
            $table->date('birthday_at')->nullable()->after('vk');
            $table->string('organization', 255)->nullable()->after('vk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
