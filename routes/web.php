<?php

Route::redirect('/', 'products/all');

Auth::routes();

Route::get('/products/all', 'AllProductsListingController@index');
Route::get('/products/{category}/{product}/buy', 'ProductsController@index')->name('products.index');
Route::get('/products/{category}', 'CategoryProductsListingController@index')->name('category.products.index');
Route::get('/my/wishlist/', 'WishListController@index')->name('wishlist.index');
Route::get('/checkout/cart/', 'CartCheckoutController@index')->name('checkout.cart.index');
Route::get('/checkout/address/', 'AddressCheckoutController@index')->name('checkout.address.index');

// Api Routes.
Route::namespace('Api')->prefix('api/v1')->name('api.')->group(function () {
    Route::get('/products/all', 'AllProductsListingController@index')->name('products.all.index');
    Route::get('/products/{category}', 'CategoryProductsListingController@index')->name('category.products.index');

    Route::post('/checkout/cart/', 'CartController@store')->name('checkout.cart.store');
    Route::get('/checkout/cart/', 'CartCheckoutController@index')->name('checkout.cart.index');
    Route::delete('/checkout/cart/{cart}', 'CartCheckoutController@destroy')->name('checkout.cart.destroy');
    Route::put('/checkout/quantity/{cart}', 'CheckoutCartQuantityController@update')->name('checkout.quantity.update');
    Route::put('/checkout/size/{cart}', 'CheckoutCartSizeController@update')->name('checkout.size.update');
    Route::get('/pincode/{pin_code}', 'PinCodesController@index')->name('pincode.index');

    Route::prefix('my')->group(function () {
        Route::get('/wishlist/', 'WishListController@index')->name('wishlist.index');
        Route::post('/wishlist/', 'WishListController@store')->name('wishlist.store');
        Route::post('/address/', 'AddressController@store')->name('my.address.store');
        Route::put('/address/{address}', 'AddressController@update')->name('my.address.update');
        Route::delete('/address/{address}', 'AddressController@destroy')->name('my.address.destroy');
    });
});