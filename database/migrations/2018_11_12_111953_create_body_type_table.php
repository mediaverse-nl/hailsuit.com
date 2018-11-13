<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodyTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_type', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('body_id')->unsigned();
            $table->foreign('body_id')->references('id')->on('body');
            $table->unsignedInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('body_type');
    }
}
