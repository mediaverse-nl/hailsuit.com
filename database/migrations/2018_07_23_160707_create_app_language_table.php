<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_language', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country');
            $table->string('country_code_short');
            $table->string('country_code_large');
            $table->string('country_code_flag');
            $table->string('currency');
            $table->timestamps();
            $table->unique(['country']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_language');
    }
}
