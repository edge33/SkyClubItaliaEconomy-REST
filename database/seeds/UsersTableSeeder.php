<?php

use App\Rank;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = \Faker\Factory::create();

        $ranks = Rank::all();

        // And now, let's create a few users in our database:
        for ($i = 0; $i < 5; $i++) {
            User::create([
                'username' => "user_$i",
                'pilot_callsign' => $faker->numerify('SCI###'),
                'rank_id' => $ranks[rand ( 0 , $ranks->count()-1 )]->id,
                'password' =>  $faker->md5()
            ]);
        }
    }
}
