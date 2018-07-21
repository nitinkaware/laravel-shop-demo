<?php

namespace App\Jobs;

use App\Http\Requests\WishListRequest;
use App\User;
use App\WishList;

final class CreateWishList {

    private $user;

    private $productId;

    public function __construct(User $user, $productId)
    {
        $this->user = $user;
        $this->productId = $productId;
    }

    public static function fromRequest(WishListRequest $request)
    {
        return new static(
            $request->user(),
            $request->productId()
        );
    }

    public function handle()
    {
        $this->user
            ->wishList()
            ->toggle($this->productId);
    }
}
