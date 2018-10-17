<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    //提交
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('')->comment('标题');
            $table->string('author')->default('')->comment('作者');
            $table->text('content')->comment('内容');
            $table->string('thumb')->default('')->comment('缩略图');
            $table->unsignedInteger('click')->default(0)->comment('查看次数');
            $table->unsignedInteger('category_id')->default(0)->comment('栏目');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->tinyInteger('is_top')->default(0)->comment('置顶|1:是,0:否');
            $table->timestamps();
        });
    }

    //回滚
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
