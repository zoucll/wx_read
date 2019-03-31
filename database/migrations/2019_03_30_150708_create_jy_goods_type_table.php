<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJyGoodsTypeTable extends Migration
{
    /**
     * Run the migrations.
     *商品类型表
     * @return void
     */
    public function up()
    {
        Schema::create('jy_goods_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_name',10)->default('')->comment('类型名称');
            $table->enum('status',[1,2])->default('1')->comment('1 可用 2 不可用');
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jy_goods_type');
    }
}
