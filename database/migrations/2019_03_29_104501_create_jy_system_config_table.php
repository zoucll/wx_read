<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJySystemConfigTable extends Migration
{
    /**
     * Run the migrations.
     *系统配置表
     * @return void
     */
    public function up()
    {
        Schema::create('jy_system_config', function (Blueprint $table) {
            $table->increments('id');
            $table->string('system_name',20)->default('')->comment('配送描述');
            $table->string('s_key',20)->default('')->comment('配置得到key');
            $table->string('s_value',120)->default('')->comment('配置devalue');
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
        Schema::dropIfExists('jy_system_config');
    }
}
