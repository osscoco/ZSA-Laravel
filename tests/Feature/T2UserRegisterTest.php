<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class T2UserRegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response1 = $this->post('/api/login', [
            'email' => 'admin.gueulesdeloup@gmail.com',
            'password' => 'Not24get'
        ]);

        $token = $response1->json()['token'];

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->post('/api/register', [
            'name' => 'User',
            'email' => 'user.gueulesdeloup@gmail.com',
            "email_verified_at" => Carbon::now(),
            'password' => Hash::make('Not24get'),
            'remember_token' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => NULL
        ]);

        var_dump($response->json()['message']);

        $response->assertStatus(200);
    }
}
