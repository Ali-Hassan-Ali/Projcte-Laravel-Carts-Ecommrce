<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenerateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generate_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cart_name');

            $table->string('cart_code');
            $table->string('cart_text');
            $table->integer('used')->nullable();
            $table->integer('status')->nullable();

            $table->bigInteger('users_id');
            $table->string('market_id')->nullable();
            $table->string('ended_cart_time')->nullable();
            $table->bigInteger('sub_category_id')->unsigned();
            
            $table->double('count_of_buy')->nullable();
    
            $table->double('amrecan_price');

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
        Schema::dropIfExists('generate_carts');
    }
}
