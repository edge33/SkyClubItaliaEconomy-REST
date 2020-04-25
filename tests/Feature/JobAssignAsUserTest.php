<?php

namespace Tests\Feature;

use App\ForumUser;
use App\User;
use Tests\TestCase;

class JobAssignTestAsUser extends TestCase
{
    /**
     * A basic test example.
     *
     * @param $
     * @return void
     */
    public function testAssignJobToPilot()
    {
        $user = ForumUser::find(100);
        $this->actingAs($user, 'api');
        $thisUserId = $user->id;
        $anotherUserId = 1;
        $response = $this->json('POST', "/api/assignJob/$thisUserId", ['job' => '1']);
        $response->assertStatus(200);
        $response = $this->json('POST', "/api/assignJob/$anotherUserId", ['job' => '1']);
        $response->assertStatus(403);
    }
}
