<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeTest extends TestCase
{
    public function test_welcome_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSeeInOrder(['nav-link active', 'Dashboard']);
        $response->assertSeeText('Login');
        $response->assertDontSeeText('Logout');
    }
}
