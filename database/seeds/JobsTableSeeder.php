<?php

use App\Rank;
use App\User;
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('jobs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $ranks = Rank::all();
        $users = User::all();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 5; $i++) {
            Job::create([
                'user_username' => $users[rand(0, $users->count() - 1)]->username,
                'title' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'description' => $faker->sentence($nbWords = 10, $variableNbWords = true),
                'departure' => $faker->lexify('????'),
                'arrival' =>  $faker->lexify('????'),
                'category' => $faker->sentence,
                'limitations' => $faker->sentence,
                'required_rank' => $ranks[rand(0, $ranks->count() - 1)]->id,
            ]);
        }
    }
}
