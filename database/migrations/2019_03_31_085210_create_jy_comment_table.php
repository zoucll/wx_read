<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJyCommentTable extends Migration
{
    /**
     * Run the migrations.
     *评论表
     * @return void
     */
    public function up()
    {
        Schema::create('jy_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('评论id');
            $table->enum('type',[1,2])->default(1)->comment('1 商品 2 文章');
            $table->integer('comment_id')->comment('评论的文章或商品id');
            $table->string('content',255)->default('')->comment('评论内容');
            $table->timestamp('create_at')->comment('创建时间');
            $table->timestamp('update_at')->comment('更新时间');
//            $table->timestamps()；
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jy_comment');
    }
}
