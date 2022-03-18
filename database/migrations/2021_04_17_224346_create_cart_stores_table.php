<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('cart_name');
            $table->text('cart_code');
            $table->string('used')->default(0);
            $table->string('user_name')->default('null');
            $table->integer('users_id');
            $table->integer('cliant_id')->default(0);
            $table->bigInteger('sub_category_id')->unsigned();        
            $table->bigInteger('products_id')->unsigned(); 
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('cart_stores');
    }
}
