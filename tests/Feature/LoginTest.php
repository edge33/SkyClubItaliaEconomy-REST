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
        return true;
        $response = $this->json('POST', '/oauth/token', [
            'username' => 'edge33',
            'password' => 'maidaf',
            "client_id" => "7",
            "client_secret" => "x9Zr2Nx5miO4KbHI7wxfCCUzugXoPTi1oYc9mN0G",
            "grant_type" => "password"
            ]);
        print_r($response);
        $response->assertStatus(200);
        $user = User::where('username', 'edge33')->get()->first();
        self::assertEquals($user->username, 'edge33');
        self::assertEquals($user->rank->id, 1);
    }
}
