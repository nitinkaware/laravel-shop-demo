<?php

namespace App\Http\Controllers\API;

use App\Address;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Http\Resources\AddressCollection;
use App\Http\Resources\AddressResource;
use App\Jobs\CreateAddress;
use App\Jobs\DeleteAddress;
use App\Jobs\UpdateAddress;

class AddressController extends Controller {

    function __construct()
    {
        $this->middleware('auth');
    }

    public function store(AddressRequest $request)
    {
        return response()->json(new AddressResource(
            $this->dispatchNow(CreateAddress::fromRequest($request))
        ), 201);
    }

    public function update(AddressRequest $request)
    {
        return response()->json(new AddressResource(
            $this->dispatchNow(UpdateAddress::fromRequest($request))
        ), 202);
    }

    public function destroy(Address $address)
    {
        $this->dispatchNow(new DeleteAddress($address));

        return response()->json(new AddressCollection(
            auth()->user()->addresses()->get()
        ), 202);
    }
}
