<?php

use Illuminate\Database\Seeder;

class DenominationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Firstly Truncate old Values.
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('denominations')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        //Now Script to populate table with new values.
        $dateNow = \Carbon\Carbon::Now();
        $userStatus = [
            [
                'label' => 'Rs. 100/- Draws',
                'denomination' => '100',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'label' => 'Rs. 200/- Draws',
                'denomination' => '200',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'label' => 'Rs. 750/- Draws',
                'denomination' => '750',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'label' => 'Rs. 1500/- Draws',
                'denomination' => '1500',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'label' => 'Rs. 7500/- Draws',
                'denomination' => '7500',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'label' => 'Rs. 15000/- Draws',
                'denomination' => '15000',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'label' => 'Rs. 25000/- Draws',
                'denomination' => '25000',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'label' => 'Rs. 40000/- Draws',
                'denomination' => '40000',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'label' => 'Rs. 40000/- Premium Draws',
                'denomination' => '40000P',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ]
        ];

        DB::table('denominations')->insert($userStatus);
    }
}
