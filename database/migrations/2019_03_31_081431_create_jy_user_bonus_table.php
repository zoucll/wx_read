<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJyUserBonusTable extends Migration
{
    /**
     * Run the migrations.
     *用户红包表
     * @return void
     */
    public function up()
    {
        Schema::create('jy_user_bonus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->ddefault(0)->comment('用户id');
            $table->integer('bonus_id')->default(0)->comment('红包id');
            $table->timestamp('status_time')->comment('红包使用时间');
            $table->timestamp('end_time')->comment('红包截止时间');
            $table->timestamp('create_at')->comment('创建时间');
            $table->timestamp('update_at')->comment('更新时间');
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
        Schema::dropIfExists('jy_user_bonus');
    }
}
