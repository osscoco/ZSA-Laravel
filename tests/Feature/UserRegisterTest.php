<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserRegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $requestLogin = $this->post('/api/login', [
            'email' => 'corentin.jeannot2a@gmail.com',
            'password' => 'root'
        ]);

        $token = $requestLogin->json()['token'];

        $response = $this->withHeaders(['Authorization', 'Bearer ' . $token])
        ->post('/api/register', [
            'name' => 'user',
            'email' => 'user@gueulesdeloup.com',
            "email_verified_at" => Carbon::now(),
            'password' => Hash::make('root'),
            'remember_token' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => NULL
        ]);

        var_dump($response->json()['message']);

        $response->assertStatus(200);
    }
}
