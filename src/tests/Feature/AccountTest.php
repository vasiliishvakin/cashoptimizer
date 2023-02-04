<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_accounts_page()
    {
        $user = User::administrator()->first();
        $response = $this->actingAs($user)->get(route('accounts.index'));
        $response->assertStatus(200);
    }
}
