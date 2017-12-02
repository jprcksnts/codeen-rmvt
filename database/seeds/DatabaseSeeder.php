<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(SalesPersonSeeder::class);
        $this->call(DepositSeeder::class);
        $this->call(WithdrawalSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(QuotaTypeSeeder::class);
        $this->call(GoalMeterSeeder::class);
    }
}
