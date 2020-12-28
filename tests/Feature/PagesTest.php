<?php

namespace Tests\Feature;

use App\Models\Community;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // community page
    public function testCommunityPage()
    {
        $community = Community::first();

        $response = $this->get('/c/' . $community->slug);

        $response->assertStatus(200);
    }

    // post page
    public function testPostPage()
    {
        $post = Post::first();

        $response = $this->get('/p/' . $post->id);

        $response->assertStatus(200);
    }
}
