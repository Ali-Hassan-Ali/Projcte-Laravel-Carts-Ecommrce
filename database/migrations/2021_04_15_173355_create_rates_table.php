<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('SAR')->default('1');
            $table->string('EGP')->default('1');
            $table->string('AED')->default('1');
            $table->string('KWD')->default('1');
            $table->string('MAD')->default('1');
            $table->string('TRY')->default('1');
            $table->string('EUR')->default('1');
            $table->string('LYD')->default('1');
            $table->string('NIS')->default('1');
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
        Schema::dropIfExists('rates');
    }
}
