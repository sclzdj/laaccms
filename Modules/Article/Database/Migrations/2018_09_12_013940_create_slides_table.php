<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    //提交
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('')->comment('标题|input');
            $table->string('url')->default('')->comment('链接地址|input');
            $table->string('pic')->default('')->comment('图片|image');
            $table->integer('click')->default(0)->comment('查看次数');
            $table->tinyInteger('status')->default(1)->comment('状态|radio|1:开启,0:关闭');
            $table->timestamps();
        });
    }

    //回滚
    public function down()
    {
        Schema::dropIfExists('slides');
    }
}
