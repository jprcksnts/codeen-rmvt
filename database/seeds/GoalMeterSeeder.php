<?php

use Illuminate\Database\Seeder;

class GoalMeterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(\App\GoalMeters::class, 20) ->create();
    }
}
