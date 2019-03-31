<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateaJyCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *商品分类表
     * @return void
     */
    public function up()
    {
        Schema::create('jy_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('f_id')->default(0)->comment('上级id');
            $table->string('cate_name',20)->default('')->comment('分类名称');
            $table->enum('status',[1,2])->default('1')->comment('1 可用 2 禁用');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jy_category');
    }
}
