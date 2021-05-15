<?php

use Illuminate\Database\Seeder;

class CliantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\Cliant::create([
            'name'                  => 'Cliant',
            'email'                 => 'super_admin@app.com',
            'phone_number'          => '0966613661',
            'password'              => bcrypt('123123123'),
        ]);

        // $user->attachRole('super_admin');
    }
}
