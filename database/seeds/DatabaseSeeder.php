<?php

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
        $this->call(LicensesTableSeeder::class);
        $this->call(RanksTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(JobLicenseTableSeeder::class);
        $this->call(LicenseUserTableSeeder::class);
    }
}
