<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_page_exist()
    {
        $response = $this->get(route('register'));
        $response->assertStatus(200);
        $response->assertSeeInOrder(['form', 'register', '_token']);
    }

    public function test_register_user()
    {
        $password = fake()->password(8, 20);
        $user = User::factory()->make();

        $response = $this->call('POST', route('register'), [
            '_token' => csrf_token(),
            'name' => $user->name,
            'email' => $user->email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(RouteServiceProvider::HOME);

        $response = $this->followRedirects($response->baseResponse);
        $response->assertStatus(200);
        $response->assertSeeInOrder(['nav-link active', 'Dashboard']);
        $response->assertSeeText('Logout');
        $response->assertDontSeeText('Login');
        $response->assertSeeInOrder(['navbarDropdownProfile', $user->name]);
    }

    public function test_login_user()
    {
        $password = fake()->password(8, 20);
        $passwordHash = Hash::make($password);
        $user = User::factory(['password' => $passwordHash])->create();

        $response = $this->call('POST', route('login'), [
            '_token' => csrf_token(),
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(RouteServiceProvider::HOME);

        $response2 = $this->followRedirects($response->baseResponse);
        $response2->assertStatus(200);

        $response2->assertSeeInOrder(['nav-link active', 'Dashboard']);
        $response2->assertSeeText('Logout');
        $response2->assertDontSeeText('Login');
        $response2->assertSeeInOrder(['navbarDropdownProfile', $user->name]);
    }

    public function test_logged_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(RouteServiceProvider::HOME);

        $response->assertStatus(200);
        $response->assertSeeText('Logout');
        $response->assertDontSeeText('Login');
    }

    public function test_logout_user()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->call('POST', route('logout'), [
            '_token' => csrf_token(),
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('welcome'));

        $response = $this->followRedirects($response->baseResponse);
        $response->assertStatus(200);


        $response->assertSeeInOrder(['nav-link active', 'Welcome']);
        $response->assertDontSeeText('Logout');
        $response->assertSeeText('Login');
    }

}
