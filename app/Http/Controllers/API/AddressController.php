<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Resources\AddressCollection;
use App\Jobs\CreateAddress;

class AddressController extends Controller {

    function __construct()
    {
        $this->middleware('auth');
    }

    public function store(AddressRequest $request)
    {
        $this->dispatchNow(CreateAddress::fromRequest($request));

        return response()->json(new AddressCollection(
            auth()->user()->addresses()->get()
        ), 201);
    }
}
