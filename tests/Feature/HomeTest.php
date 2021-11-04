<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    
    public function test_homepage_is_working_correctly()
    {
        $response = $this->get('/');

        $response->assertSeeText('This is the home page');
    }

    public function test_postspage_is_working_correctly()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('This is the posts index page');
    }
}
