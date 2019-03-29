<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJyFriendLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jy_firend_link', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link_name',20)->default('')->comment('链接名称');
            $table->enum('status',[1,2])->default(1)->comment('1 可用 2 不可用');
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
        Schema::dropIfExists('jy_firend_link');
    }
}
