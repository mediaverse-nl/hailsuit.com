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
        Schema::create('faq_translation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('language_id')->unsigned();
            $table->foreign('language_id')->references('id')->on('app_language');
            $table->unsignedInteger('faq_id')->unsigned();
            $table->foreign('faq_id')->references('id')->on('faq');
            $table->string('title', 120);
            $table->string('description', 2000);
            $table->unique(['language_id', 'faq_id']);
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
