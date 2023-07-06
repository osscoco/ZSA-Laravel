<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class T6CardAllTest extends TestCase
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

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)->get('/api/cards');

        var_dump($response->json()['cards']);

        $response->assertStatus(200);
    }
}
