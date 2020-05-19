<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/food');

        $response->assertStatus(200);
    }

    public function testFoodUpdate()
    {
        $response = $this->get('/food');

        $response->assertStatus(200);
    }

    public function testTrue()
    {
        $var = true;
        $this->assertTrue($var);
    }
}