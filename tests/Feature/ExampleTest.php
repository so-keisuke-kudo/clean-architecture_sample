<?php

namespace Tests\Feature;

use Domain\Entities\UserEntity;
use Domain\ValueObjects\UserAddress;
use Domain\ValueObjects\UserEmail;
use Domain\ValueObjects\UserName;
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
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
