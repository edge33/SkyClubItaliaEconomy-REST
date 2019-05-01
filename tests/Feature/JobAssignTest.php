<?php

namespace Tests\Feature;

use App\ForumUser;
use App\User;
use Tests\TestCase;

class JobAssignTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @param $
     * @return void
     */
    public function testAssignJobToPilot()
    {
        $user = ForumUser::find(174);
        $this->actingAs($user, 'api');
        $id = $user->user_id;
        $response = $this->json('POST', "/api/assignJob/$id", ['job' => '1']);
        $response->assertStatus(200);
        $pilot = User::find($id);
        $pilot->load('jobs');
        self::assertEquals(1, $pilot->jobs->count());
        $response = $this->json('POST', "/api/assignJob/$id", ['job' => '2']);
        $pilot->load('jobs');
        $response->assertStatus(200);
        self::assertEquals(2, $pilot->jobs->count());
        $response = $this->json('POST', "/api/assignJob/$id", ['job' => '3']);
        $response->assertStatus(200);
        $pilot->load('jobs');
        self::assertEquals(3, $pilot->jobs->count());
        $response = $this->json('POST', "/api/assignJob/$id", ['job' => '4']);
        $response->assertStatus(406);
        $pilot->load('jobs');
        self::assertEquals(3, $pilot->jobs->count());
    }
}
