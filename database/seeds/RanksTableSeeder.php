<?php

use Illuminate\Database\Seeder;
use App\Rank;
class RanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        // Rank::truncate();

        $faker = \Faker\Factory::create();


        Rank::create([
            'rank_name' => 'Novice'
        ]);
        Rank::create([
            'rank_name' => 'Medium'
        ]);
        Rank::create([
            'rank_name' => 'Senior'
        ]);
        Rank::create([
            'rank_name' => 'Expert'
        ]);
    }
}
