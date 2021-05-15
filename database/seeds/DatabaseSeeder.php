<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CliantTableSeeder::class);
        $this->call(ParentCategoryTableSeeder::class);
        $this->call(SubCategoryTableSeeder::class);
        $this->call(MarketTableSeeder::class);
        // $this->call(CartTableSeeder::class);
        $this->call(PayCurrencieTableSeeder::class);
    }
}
