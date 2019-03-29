<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJyAdTable extends Migration
{
    /**
     * Run the migrations.
     *广告表
     * @return void
     */
    public function up()
    {
        Schema::create('jy_ad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position_id')->default(0)->comment('广告位置');
            $table->string('ad_name',60)->default('')->comment('该广告条纪录的广告名臣');
            $table->string('image_url',150)->default('')->comment('广告图片地址');
            $table->string('ad_link')->default('')->comment('广告链接地址');
            $table->timestamp('start_time')->comment('广告开始时间');
            $table->timestamp('end_time')->comment('广告结束时间');
            $table->integer('clicks')->default(rand(1,100))->comment('该广告点击');
            $table->enum('status',[1,2])->default('1')->comment('该广告是否关闭 1开启 2 关闭;关闭后广告状态将不会在有效');
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
        Schema::dropIfExists('jy_ad');
    }
}
