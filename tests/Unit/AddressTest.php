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
            'pin_code'   => 414001,
            'town'       => 'Ahmednagar',
            'distinct'   => 'Ahmednagar',
            'state'      => 'Maharashtra',
            'state_code' => 'MH',
            'name'       => 'Nitin Kaware',
            'address'    => 'At. Dahigaon, Post: Shiradhon',
            'mobile'     => 7577887766,
            'is_default' => false,
        ]);

        $this->assertCount(1, auth()->user()->addresses()->get());
    }
}
