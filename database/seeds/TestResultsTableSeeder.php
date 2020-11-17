<?php

use Illuminate\Database\Seeder;

class TestResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\TestResults::class, 10)->create();
    }
}
