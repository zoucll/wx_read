<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJyBrandTable extends Migration
{
    /**
     * Run the migrations.
     *商品品牌表
     * @return void
     */
    public function up()
    {
        Schema::create('jy_brand', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand_name',20)->default('')->commnent('品牌名称');
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
        Schema::dropIfExists('jy_brand');
    }
}
