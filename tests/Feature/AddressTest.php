<?php

namespace Tests\Feature;

use App\Address;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddressTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    function unauthenticated_users_can_not_access_address()
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

        foreach (['0', '12345', '1234567', '-', '1111--', '9', 4] as $pinCode) {
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

        $data = [
            'pin_code' => '414001',
            'locality' => 'Ahmednagar',
            'name'     => 'Nitin Kaware',
            'address'  => 'At Dahigaon, Post. Shiradhon',
            'mobile'   => '9988778877',
        ];

        $this->postJson(route('api.my.address.store'), $data)->assertStatus(201);

        $this->assertCount(1, auth()->user()->addresses()->get());

        $savedAddress = auth()->user()->addresses()->first();

        collect(['pin_code', 'name', 'address', 'mobile'])->each(function ($key) use ($data, $savedAddress) {
            $this->assertEquals($data[$key], $savedAddress->{$key});
        });
    }

    /** @test */
    function it_should_delete_address()
    {
        /** @var User $jeffery */
        $jeffery = factory(User::class)->create();

        /** @var User $john */
        $john = factory(User::class)->create();

        // Given We have two addresses.
        // We sign in with jeffery and jef send request to delete the address.
        $jefferyAddress = factory(Address::class)->create(['user_id' => $jeffery]);
        $johnAddress = factory(Address::class)->create(['user_id' => $john]);

        $this->signIn($jeffery);

        $this->deleteJson(route('api.my.address.destroy', $jefferyAddress))
            ->assertStatus(202);

        $this->assertTrue($john->addresses()->first()->is($johnAddress));

        // Jeff should have zero address.
        $this->assertCount(0, $jeffery->addresses()->get());
    }

    /** @test */
    function user_can_update_his_address()
    {
        $this->signIn();

        $data = [
            'pin_code' => '414001',
            'locality' => 'Ahmednagar',
            'name'     => 'Nitin Kaware',
            'address'  => 'At Dahigaon, Post. Shiradhon',
            'mobile'   => '9988778877',
        ];

        $this->postJson(route('api.my.address.store'), $data)->assertStatus(201);

        $this->withoutExceptionHandling();

        $data = [
            'pin_code' => '411038',
            'locality' => 'Kothrud',
            'name'     => 'Amol Wagh',
            'address'  => 'Flat No. 6',
            'mobile'   => '9988776655',
        ];

        $this->putJson(route('api.my.address.update', Address::first()), $data)->assertStatus(202);

        $savedAddress = auth()->user()->addresses()->first();

        collect(['pin_code', 'name', 'address', 'mobile'])->each(function ($key) use ($data, $savedAddress) {
            $this->assertEquals($data[$key], $savedAddress->{$key});
        });
    }
}
