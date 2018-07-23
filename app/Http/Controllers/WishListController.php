<?php

namespace App\Http\Controllers;

class WishListController extends Controller {

    public function index()
    {
        return view('my.wishlist.index');
    }
}
