<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(seedSnapData::class);
        $this->call(seedHomelessData::class);
        $this->call(studentLoan2019::class);
    }
}
