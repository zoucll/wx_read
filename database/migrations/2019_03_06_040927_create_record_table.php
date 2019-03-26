<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bs_record', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('用户id');
            $table->integer('bonus_id')->comment('红包id');
            $table->decimal('money',10,2)->comment('用户抢到的金额');
            $table->enum('flag',['1','2'])->default(1)->comment('是否最佳手气 :1否 2是');
            $table->timestamps();
            $table->unique(['user_id','bonus_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bs_record');
    }
}
