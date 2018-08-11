<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\TestResponse;

abstract class TestCase extends BaseTestCase {

    use CreatesApplication;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        TestResponse::macro('assertValidationFails', function ($attribute) {
            $this->assertStatus(422)->assertJsonValidationErrors($attribute);
        });
    }

    protected function signIn($user = null)
    {
        $user = $user ?: factory(\App\User::class)->create();

        $this->actingAs($user);

        return $this;
    }
}
