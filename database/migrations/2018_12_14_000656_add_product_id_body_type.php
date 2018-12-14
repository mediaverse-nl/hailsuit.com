<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductIdBodyType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('body_type', function ($table) {
            $table->unsignedInteger('product_id')->nullable()->unsigned();
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('body_type', function ($table) {
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');
        });
    }
}
