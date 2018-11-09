<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('product');
            $table->unsignedInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brand');
            $table->unsignedInteger('carrosserie_id')->unsigned();
            $table->foreign('carrosserie_id')->references('id')->on('carrosserie');
            $table->string('model_year');
            $table->string('value');
            $table->timestamps();
//            $table->unique(['brand_id', 'model_year', 'value']); TODO werkt niet
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type');
    }
}
