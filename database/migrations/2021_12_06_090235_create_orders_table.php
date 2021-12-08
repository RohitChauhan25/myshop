<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('customer_id');
            // $table->foreign('customer_id')->references('id')->on('users');

            $table->foreignId('customer_id')->constrained('users');
            // $table->unsignedBigInteger('vendor_id');
            // $table->foreign('vendor_id')->references('id')->on('users');

            $table->foreignId('vendor_id')->constrained('users');

            $table->foreignId('product_id')->constrained('products');
            $table->integer('price');
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
        Schema::dropIfExists('orders');
    }
}
