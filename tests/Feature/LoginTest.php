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
        $response = $this->json('POST', '/api/login', [
            'username' => 'edge33',
            'password' => 'maidaf',
        ]);
        $response->assertStatus(200);
        $user = User::where('username', 'edge33')->get()->first();
        self::assertEquals($user->username, 'edge33');
        self::assertEquals($user->rank->id, 1);
    }
}
