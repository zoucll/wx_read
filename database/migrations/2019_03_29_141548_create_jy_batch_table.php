<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJyBatchTable extends Migration
{
    /**
     * Run the migrations.
     *批次数据表
     * @return void
     */
    public function up()
    {
        Schema::create('jy_batch', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_path')->default('')->comment('批次文件路径');
            $table->enum('type',[1,2,3])->default('1')->comment('1 发红包 2发短信 3邮件');
            $table->string('comtent',50)->default('')->comment('批次的内容');
            $table->enum('status',[1,2,3])->default('1')->comment('1 未审核 2 待发送 3已发送');
            $table->string('note',20)->default('')->comment('备注信息');
            $table->timestamp('create_at')->comment('创建时间');
            $table->timestamp('updated_at')->comment('更新时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jy_batch');
    }
}
