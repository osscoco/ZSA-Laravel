<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class T7CardUpdateTest extends TestCase
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

        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
        ->put('/api/cards/update/1', [
            'reference' => 'Carte 1 Modifié',
            'fidelityPoints' => 5
        ]);

        var_dump($response->json()['message']);

        $response->assertStatus(200);
    }
}
