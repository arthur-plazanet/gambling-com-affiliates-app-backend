<?php

namespace Tests\Feature;

use Tests\TestCase;

class GetAffiliatesDataTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/api/affiliates');
        $this->assertArrayHasKey('name', $response[0]);
    }
}
