<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTranslationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_translation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('app_language');
            $table->unsignedInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product');
            $table->string('name');
            $table->string('description');
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
        Schema::dropIfExists('product_translation');
    }
}