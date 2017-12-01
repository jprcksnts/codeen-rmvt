<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(SalesPersonSeeder::class);
//        $this->call(GoalMeterSeeder::class);
//        $this->call(QuotaTypeSeeder::class);

    }
}
