<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SpotifyTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testListAlbumsWithoutBandName()
    {
        $response = $this->get('/api/v1/albums');
        $response->assertStatus(400);
        $response->assertJson([
            'message' => 'No band name specified',
        ]);
    }

    public function testListAlbumsWithBandName()
    {
        $response = $this->get('/api/v1/albums?q=the-beatles');

        $response->assertStatus(200);
    }
}
