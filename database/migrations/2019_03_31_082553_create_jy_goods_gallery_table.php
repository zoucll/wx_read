<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJyGoodsGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *商品相册
     * @return void
     */
    public function up()
    {
        Schema::create('jy_goods_gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id')->default(0)->comment('商品id');
            $table->string('image_name')->default('')->comment('图片描述');
            $table->string('image_url')->default('')->comment('图片地址');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jy_goods_gallery');
    }
}
