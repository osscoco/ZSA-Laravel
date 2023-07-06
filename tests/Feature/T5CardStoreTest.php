<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class T5CardStoreTest extends TestCase
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
        ->post('/api/cards/store', [
            'reference' => 'Carte 1',
            'fidelityPoints' => 0
        ]);

        var_dump($response->json()['card']);

        $response->assertStatus(200);
    }
}
