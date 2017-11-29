<?php

use Illuminate\Database\Seeder;

class SalesPersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\SalesPerson::class, 30)->create(function ($salesPerson) {
            //Add code if necessary, ex. Adding more factory which uses the sales person table
        });
    }
}
