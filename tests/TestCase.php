<?php

namespace Tests;

use App\Rank;
use App\Role;
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
        $user = new User();
        $user->id = 174;
        $user->username = 'testuser';
        $user->pilot_callsign = 'SCI000';
        $user->rank()->associate(Rank::find(1));
        $user->role()->associate(Role::find(2));
        $user->save();
    }
}
