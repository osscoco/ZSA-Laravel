<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class T1UserLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post('/api/login', [
            'email' => 'admin.gueulesdeloup@gmail.com',
            'password' => 'Not24get'
        ]);

        var_dump($response->json()['message']);

        $response->assertStatus(200);
    }
}
