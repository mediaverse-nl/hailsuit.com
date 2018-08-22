<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_order', function (Blueprint $table) {
            $table->unsignedInteger('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('order');
            $table->unsignedInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product');
            $table->decimal('price', 10, 2);
            $table->mediumInteger('amount');
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
        Schema::dropIfExists('product_order');
    }
}
