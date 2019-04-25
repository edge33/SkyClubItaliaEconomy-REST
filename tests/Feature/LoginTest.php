<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * tests Login.
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->json('POST', '/api/login', ['username' => 'testuser', "password" => "maidaf"]);
        $user = User::where('username', 'testuser')->get()->first();
        self::assertEquals($user->username, 'testuser');
        self::assertEquals($user->rank->id, 1);
        $response->assertStatus(200);
        $user->delete();
    }
}
