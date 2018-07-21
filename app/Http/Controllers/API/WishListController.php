<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\WishListRequest;
use App\Http\Controllers\Controller;
use App\Jobs\CreateWishList;

class WishListController extends Controller {

    function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function store(WishListRequest $request)
    {
        $this->dispatchNow(CreateWishList::fromRequest($request));

        return response([], 202);
    }
}
