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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('licenses')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        License::create([
            'license_name' => 'IFR'
        ]);
        License::create([
            'license_name' => 'VFR'
        ]);
    }
}
