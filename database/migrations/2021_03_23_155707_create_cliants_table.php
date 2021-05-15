<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCliantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('image')->default('default.png');
            $table->string('password');
            // SMS
            $table->string('phone_number')->default('default.png');
            $table->integer('isVerified')->default(0);
            $table->integer('emailVerified')->default(0);

            // Socialite 
            $table->string('provider')->nullable();
            $table->string('stars')->nullable();
            $table->string('provider_id')->nullable();
            // seeeting
            $table->text('code_phone')->nullable();
            $table->text('code_email')->nullable();

            $table->double('code_cart_phone')->default('1');
            $table->double('code_cart_email')->default('0');
            $table->double('monthly_message')->default('0');
            $table->double('holiday_message')->default('0');
            $table->double('smart_email')->default('0');

            $table->string('assignmen_link')->default('365423');
            $table->string('another_assignmen_link')->nullable();
            $table->string('count_of_order')->nullable();
            $table->string('assignmen_balance')->nullable();
            $table->string('assignmen_users')->nullable();

            // $table->text('currency_type');
            $table->string('account_balance')->default('0');
            $table->string('message')->default('0');

            // $table->integer('occastion_Status')->default('0');
            // $table->string('assignment_code');
            $table->rememberToken();
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
        Schema::dropIfExists('cliants');
    }
}
