<?php

Route::redirect('/', 'products/all');

Auth::routes();

Route::get('/products/all', 'AllProductsListingController@index');
Route::get('/products/{category}/{product}/buy', 'ProductsController@index')->name('products.index');
Route::get('/products/{category}', 'CategoryProductsListingController@index')->name('category.products.index');
Route::get('/my/wishlist/', 'WishListController@index')->name('wishlist.index');
Route::get('/checkout/cart/', 'CartCheckoutController@index')->name('checkout.cart.index');

// Api Routes.
Route::namespace('Api')->prefix('api/v1')->name('api.')->group(function () {
    Route::get('/products/all', 'AllProductsListingController@index')->name('products.all.index');
    Route::get('/products/{category}', 'CategoryProductsListingController@index')->name('category.products.index');

    Route::post('/checkout/cart/', 'CartController@store')->name('checkout.cart.store');
    Route::get('/checkout/cart/', 'CartCheckoutController@index')->name('checkout.cart.index');
    Route::delete('/checkout/cart/{cart}', 'CartCheckoutController@destroy')->name('checkout.cart.destroy');
    Route::put('/checkout/quantity/{cart}', 'CheckoutCartQuantityController@update')->name('checkout.quantity.update');

    Route::prefix('my')->group(function () {
        Route::get('/wishlist/', 'WishListController@index')->name('wishlist.index');
        Route::post('/wishlist/', 'WishListController@store')->name('wishlist.store');
    });
});