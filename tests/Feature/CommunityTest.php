<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommunityTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    public function testListOfMyCommunities()
    {
        $user = User::withCount('communities')->has('communities')->first();
        auth()->login($user);

        $response = $this->get('/communities');
        $response->assertStatus(200);

        $this->assertEquals($user->communities_count,
            substr_count($response->getContent(), "community-item"));
    }

    public function testCreateCommunity()
    {
        $user = User::first();
        auth()->login($user);

        $response = $this->post('/communities', [
            'name' => 'Some name 1234567',
            'description' => 'Some description 1234567'
        ]);
        $response->assertStatus(302);

        $response = $this->get('/communities');
        $response->assertStatus(200);

        $this->assertStringContainsString('Some name 1234567', $response->getContent());
    }
}
