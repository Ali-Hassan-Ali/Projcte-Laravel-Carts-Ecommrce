<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('used')->nullable();
            $table->double('quantity')->default('0');
            $table->double('balance');
            $table->integer('status')->nullable();
            $table->integer('rating');
            $table->integer('stars')->nullable();
            $table->double('count_of_buy')->default('0');
            $table->double('amrecan_price');

            $table->integer('market_id')->nullable();        
            $table->bigInteger('users_id');

            $table->bigInteger('cart_details_id')->unsigned();        
            $table->foreign('cart_details_id')->references('id')->on('cart_details')->onDelete('cascade');

            $table->bigInteger('sub_category_id')->unsigned();        
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
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
        Schema::dropIfExists('carts');
    }
}
