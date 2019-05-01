<?php

namespace Tests;

use App\Rank;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        Artisan::call('db:seed');
        Artisan::call('passport:install');
        $user = new User([
            'id' => '174',
            'username' => 'testuser',
            'pilot_callsign' => 'SCI000',
            'rank_id' => 1
        ]);
        $user->id = 174;
        $user->username = 'testuser';
        $user->pilot_callsign = 'SCI000';
        $user->rank()->associate(Rank::find(1));
        $user->save();
    }
}
