<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Jobs\CreateAddress;

class AddressController extends Controller {

    function __construct()
    {
        $this->middleware('auth');
    }

    public function store(AddressRequest $request)
    {
        $address = $this->dispatchNow(CreateAddress::fromRequest($request));

        return response()->json($address, 201);
    }
}
