<?php

namespace Tests\Feature;

use App\User;
use function GuzzleHttp\headers_from_lines;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * tests Login.
     *
     * @return void
     */
    public function testLogin()
    {

        $response = $this->json('POST', '/api/login', ['username' => 'testuser', 'password' => 'maidaf']);
        $response->assertStatus(200);
        $user = User::where('username', 'testuser')->get()->first();
        self::assertEquals($user->username, 'testuser');
        self::assertEquals($user->rank->id, 1);
    }
}
