<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('y_role', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('')->comment('名字');
            $table->string('avatar')->default('')->comment('头像');
            $table->string('banner')->default('')->comment('横幅');
            $table->string('image')->default('')->comment('大图');
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
        Schema::dropIfExists('y_role');
    }
}
