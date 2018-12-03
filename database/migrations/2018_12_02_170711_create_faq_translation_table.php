<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqTranslationTable extends Migration
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
            $table->unsignedInteger('faq_id')->unsigned();
            $table->foreign('faq_id')->references('id')->on('body');
            $table->unsignedInteger('faq_id')->unsigned();
            $table->foreign('faq_id')->references('id')->on('body');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faq_translation');
    }
}
