<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserTable extends Migration
{
    /**
     * Run the migrations.
     *用户表
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('username',50)->default('')->comment('用户名');
            $table->string('password',32)->default('')->comment(',密码');
            $table->string('image_url',150)->default('')->comment('用户头像');
            $table->enum('is_super',[1,2])->default('1')->comment('是否是超管 1非超管 2 超管');
            $table->enum('status',[1,2])->default('1')->comment('用户状态1 正常 2 停用');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user');
    }
}
