<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupportCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('claint_id')->unsigned();

            $table->text('cliant_email');
            $table->text('ticit_answer')->default('default');
            $table->text('ticit_reply')->default('default');
            $table->text('ticit_address');
            $table->text('ticit_type');
            $table->text('number_ticit');
            $table->text('images');
            $table->longText('details_ticit');

            $table->foreign('claint_id')->references('id')->on('cliants')->onDelete('cascade');
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
        Schema::dropIfExists('support_carts');
    }
}
