<?php

use Illuminate\Database\Seeder;
use App\License;

class LicensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        License::create([
            'license_name' => 'IFR'
        ]);
        License::create([
            'license_name' => 'VFR'
        ]);
    }
}
