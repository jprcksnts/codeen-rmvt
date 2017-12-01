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
        $this->call(VolumesSeeder::class);
        $this->call(SalesPersonSeeder::class);
        $this->call(DepositSeeder::class);
        $this->call(WithdrawalSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(QuotaTypeSeeder::class);
        $this->call(GoalMeterSeeder::class);

    }
}
