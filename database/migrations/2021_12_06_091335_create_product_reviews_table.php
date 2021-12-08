<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            
            // $table->unsignedBigInteger('product_id');
            // $table->foreign('product_id')->references('id')->on('products');

            $table->foreignId('product_id')->constrained('products');

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('user_id')->constrained('users');

            // $table->unsignedBigInteger('order_id');
            // $table->foreign('order_id')->references('id')->on('orders');
            $table->foreignId('order_id')->constrained('orders');
            $table->string('rating');
            $table->string('review');
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
        Schema::dropIfExists('product_reviews');
    }
}
