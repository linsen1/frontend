<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('openId')->nullable()->comment('微信标识');
            $table->string('nickName')->nullable()->comment('昵称');
            $table->integer('gender')->nullable()->comment('性别');
            $table->string('language')->nullable()->comment('语言');
            $table->string('city')->nullable()->comment('城市');
            $table->string('province')->nullable()->comment('省份');
            $table->string('country')->nullable()->comment('国家');
            $table->string('avatarUrl')->nullable()->comment('头像');
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
