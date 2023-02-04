<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountTypeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_account_types_page()
    {
        $user = User::administrator()->first();
        $response = $this->actingAs($user)->get(route('account-types.index'));
        $response->assertStatus(200);
    }
}
