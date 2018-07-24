<?php

// Api Routes.
Route::middleware('throttle:60,1')->namespace('Api')->prefix('v1')->name('api.')->group(function () {
    Route::get('/products/all', 'AllProductsListingController@index')->name('products.all.index');
    Route::get('/products/{category}', 'CategoryProductsListingController@index')->name('category.products.index');

    Route::prefix('my')->group(function () {
        Route::get('/wishlist/', 'WishListController@index')->name('wishlist.index');
        Route::post('/wishlist/', 'WishListController@store')->name('wishlist.store');
    });
});