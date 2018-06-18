<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResoucesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resouces', function (Blueprint $table) {
            $table->increments('id')->comment("主键");;
            $table->string("title")->comment("资源标题");
            $table->integer("type")->comment("类型：0 电子书；1 源码 2 课堂");
            $table->string("bigImgUrl")->nullable()->comment("封面图片地址");
            $table->string("onelineUrl")->nullable()->comment("在线预览地址");
            $table->string("downURLBaidu")->nullable()->comment("百度网盘下载地址");
            $table->string("downUrlTX")->nullable()->comment("腾讯网盘下载地址");
            $table->string("about",600)->nullable()->comment("简短介绍");
            $table->text("conetent")->nullable()->comment("详细介绍");
            $table->integer("click")->default(0)->comment("点击量");
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
        Schema::dropIfExists('resouces');
    }
}
