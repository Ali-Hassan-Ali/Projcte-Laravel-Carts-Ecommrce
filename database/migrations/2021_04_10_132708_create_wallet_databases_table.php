<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletDatabasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_databases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cart_id');
            $table->text('cart_name');
            $table->longText('short_descript');
            $table->longText('cart_text');
            $table->text('image');
            $table->bigInteger('users_id');
            $table->double('amrecan_price');
            $table->bigInteger('market_id')->unsigned();        
            $table->bigInteger('sub_category_id')->unsigned();    
            $table->foreign('market_id')->references('id')->on('markets')->onDelete('cascade');
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
        Schema::dropIfExists('wallet_databases');
    }
}
