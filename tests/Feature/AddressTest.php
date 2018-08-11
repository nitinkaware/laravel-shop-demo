<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddressTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    function user_should_be_signed_in_for_this_action()
    {
        $this->postJson(route('api.my.address.store'))
            ->assertStatus(401);
    }

    /** @test */
    function it_required_pin_code()
    {
        $this->signIn();

        $this->postJson(route('api.my.address.store'))
            ->assertValidationFails('pin_code');
    }

    /** @test */
    function it_should_be_max_and_min_6_integers_only()
    {
        $this->signIn();

        foreach (['12345', '1234567'] as $pinCode) {
            $this->postJson(route('api.my.address.store'), [
                'pin_code' => $pinCode,
            ])->assertValidationFails('pin_code');
        }
    }

    /** @test */
    function locality_is_required()
    {
        $this->signIn();

        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '123456',
        ])->assertValidationFails('locality');
    }

    /** @test */
    function locality_should_be_string()
    {
        $this->signIn();

        //Should be a string.
        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '123456',
            'locality' => 'Nitin1',
        ])->assertValidationFails('locality');
    }

    /** @test */
    function locality_can_be_max_of_100_characters()
    {
        $this->signIn();

        $moreThan100Characters = str_repeat('ahmednagar', 11);

        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '123456',
            'locality' => $moreThan100Characters,
        ])->assertValidationFails('locality');
    }

    /** @test */
    function name_is_required()
    {
        $this->signIn();

        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '123456',
            'locality' => 'Ahmednagar',
        ])->assertValidationFails('name');
    }

    /** @test */
    function name_can_be_max_of_100_characters()
    {
        $this->signIn();

        $moreThan100Characters = str_repeat('aaaaaaaaaa', 11);

        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '123456',
            'locality' => 'Ahmednagar',
            'name'     => $moreThan100Characters,
        ])->assertValidationFails('name');
    }

    /** @test */
    function name_does_not_include_numbers()
    {
        $this->signIn();

        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '123456',
            'locality' => 'Ahmednagar',
            'name'     => '1212Nitin',
        ])->assertValidationFails('name');
    }

    /** @test */
    function address_is_required()
    {
        $this->signIn();

        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '123456',
            'locality' => 'Ahmednagar',
            'name'     => 'Nitin Kaware',
        ])->assertValidationFails('address');
    }

    /** @test */
    function address_can_be_max_of_150_characters()
    {
        $this->signIn();

        $moreThan140Characters = str_repeat('ahmednagar', 16);

        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '123456',
            'locality' => 'Ahmednagar',
            'name'     => 'Nitin Kaware',
            'address'  => $moreThan140Characters,
        ])->assertValidationFails('address');
    }

    /** @test */
    function mobile_is_required()
    {
        $this->signIn();

        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '123456',
            'locality' => 'Ahmednagar',
            'name'     => 'Nitin Kaware',
            'address'  => 'At Dahigaon, Post. Shiradhon',
        ])->assertValidationFails('mobile');
    }


    /** @test */
    function mobile_should_be_numbers_only()
    {
        $this->signIn();

        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '123456',
            'locality' => 'Ahmednagar',
            'name'     => 'Nitin Kaware',
            'address'  => 'At Dahigaon, Post. Shiradhon',
            'mobile'   => 'dsfdf',
        ])->assertValidationFails('mobile');

        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '123456',
            'locality' => 'Ahmednagar',
            'name'     => 'Nitin Kaware',
            'address'  => 'At Dahigaon, Post. Shiradhon',
            'mobile'   => '111.11',
        ])->assertValidationFails('mobile');
    }

    /** @test */
    function mobile_can_be_max_10_and_min_10()
    {
        $this->signIn();

        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '123456',
            'locality' => 'Ahmednagar',
            'name'     => 'Nitin Kaware',
            'address'  => 'At Dahigaon, Post. Shiradhon',
            'mobile'   => '12345678901',
        ])->assertValidationFails('mobile');

        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '123456',
            'locality' => 'Ahmednagar',
            'name'     => 'Nitin Kaware',
            'address'  => 'At Dahigaon, Post. Shiradhon',
            'mobile'   => '123456789',
        ])->assertValidationFails('mobile');
    }

    /** @test */
    function it_should_save_a_new_address_into_database()
    {
        $this->signIn();

        $this->postJson(route('api.my.address.store'), [
            'pin_code' => '414001',
            'locality' => 'Ahmednagar',
            'name'     => 'Nitin Kaware',
            'address'  => 'At Dahigaon, Post. Shiradhon',
            'mobile'   => '9988778877',
        ])->assertStatus(201);

        $this->assertCount(1, auth()->user()->addresses()->get());
    }
}
