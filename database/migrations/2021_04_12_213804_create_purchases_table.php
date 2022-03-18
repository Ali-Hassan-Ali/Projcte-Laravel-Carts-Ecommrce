<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text')->nullable();
            $table->bigInteger('number');
            $table->bigInteger('cart_id');
            $table->bigInteger('sub_category_id');
            $table->string('cart_name');
            $table->longText('short_descript');
            $table->longText('cart_text');
            $table->string('date');
            $table->string('rate');
            $table->string('code');
            $table->string('status')->default('0');
            $table->string('image')->default('default.png');
            $table->integer('purchases_status');
            $table->integer('users_id');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('totalprice');
            $table->integer('totaltax');
            $table->integer('newTotalwithTax');
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
        Schema::dropIfExists('purchases');
    }
}
