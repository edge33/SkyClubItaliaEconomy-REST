<?php

use Illuminate\Database\Seeder;
use App\Job;
class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        //Job::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Job::create([
                'title' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
                'departure' => $faker->text($maxNbChars = 4),
                'arrival' =>  $faker->text($maxNbChars = 4),
                'category' => $faker->sentence,
                'limitations' => $faker->sentence,
                'required_rank' => $faker->sentence,
            ]);
        }
    }
}
