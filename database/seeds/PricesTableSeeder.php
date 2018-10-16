<?php

use Illuminate\Database\Seeder;

use App\Entities\Price;
class PricesTableSeeder extends Seeder
{

    public function run()
    {
        Price::insert([
            'title' => 'create_project',
            'amount' => 100,
        ]);

        Price::insert([
            'title' => 'create_task',
            'amount' => 10,
        ]);
    }
}
