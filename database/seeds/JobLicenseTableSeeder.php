<?php

use App\Job;
use App\License;
use Illuminate\Database\Seeder;

class JobLicenseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('job_license')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $jobs = Job::all();
        $licenses = License::all();

        foreach ($jobs as $job) {
            $limit = rand(0, $licenses->count() - 1);
            foreach (range(0, $limit) as $licenseIndex) {
                $job->requiredLicenses()->attach($licenses[$licenseIndex]);
            }
        }
    }
}
