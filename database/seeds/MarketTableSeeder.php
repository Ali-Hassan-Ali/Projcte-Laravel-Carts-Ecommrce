<?php

use Illuminate\Database\Seeder;

class MarketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $markets = \App\Models\Market::create([
            'user_id' 			 => "1",
            'name'               => ['ar'=> 'السعودي', 'en' => 'testing'],
        ]);

        $markets = \App\Models\Market::create([
            'user_id' 			 => "1",
            'name'   		     => "الماراتي",
        ]);

        $markets = \App\Models\Market::create([
            'user_id' 			 => "1",
            'name'   		     => "البرطاني",
        ]);


        $markets = \App\Models\Market::create([
            'user_id' 			 => "1",
            'name'   		     => "الامركي",
        ]);

        $markets = \App\Models\Market::create([
            'user_id' 			 => "1",
            'name'   		     => "المصري",
        ]);

        $markets = \App\Models\Market::create([
            'user_id' 			 => "1",
            'name'   		     => "كاش يو",
        ]);

        $markets = \App\Models\Market::create([
            'user_id' 			 => "1",
            'name'   		     => "المصلري",
        ]);

        $markets = \App\Models\Market::create([
            'user_id' 			 => "1",
            'name'   		     => "القطري",
        ]);

        $markets = \App\Models\Market::create([
            'user_id' 			 => "1",
            'name'   		     => "العماني",
        ]);
    }
}
