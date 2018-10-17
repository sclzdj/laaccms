<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWechatConfigsTable extends Migration
{
    //提交
    public function up()
    {
        Schema::create('wechat_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('配置项|input');
            $table->string('value')->default('')->comment('配置值|input');
            $table->timestamps();
        });
    }

    //回滚
    public function down()
    {
        Schema::dropIfExists('wechat_configs');
    }
}
