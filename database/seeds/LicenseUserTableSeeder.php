<?php

use App\License;
use App\User;
use Illuminate\Database\Seeder;

class LicenseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('license_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users = User::all();
        $licenses = License::all();

        foreach ($users as $user) {
            $limit = rand(0, $licenses->count() - 1);
            foreach (range(0, $limit) as $licenseIndex) {
                $user->licenses()->attach($licenses[$licenseIndex]);
            }
        }
    }
}
