<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->nullabe();
            $table->string('company_vat')->nullabe();
            $table->string('company_coc')->nullabe();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('postal_code');
            $table->string('address');
            $table->string('address_number');
            $table->string('name');
            $table->string('email');
            $table->string('telephone');
            $table->string('currency')->nullabe();
            $table->float('total_paid', 8, 2);
            $table->float('shipping_cost', 8, 2);
            $table->string('payment_id');
            $table->string('payment_method');
            $table->string('package_tracking_code');
            $table->string('status')->default('paid');
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
        Schema::dropIfExists('order');
    }
}
