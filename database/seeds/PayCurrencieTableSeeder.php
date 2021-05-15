<?php

use Illuminate\Database\Seeder;

class PayCurrencieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = ['Bitcoin', 'Dogecoin','Etherum','usdt'];

        foreach ($links as $link) {

            \App\Models\PayCurrencie::create([
               'name' => $link,
               'link' => '#',
            ]);

        }//end of foreach
    }
}
