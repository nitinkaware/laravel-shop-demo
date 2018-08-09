<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddressTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    function a_user_has_many_addresses()
    {
        $this->signIn();

        auth()->user()->addresses()->create([
            ''
        ]);

        $this->assertCount(1, auth()->user()->addresses()->get());
    }
}
