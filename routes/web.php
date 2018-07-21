<?php

Route::redirect('/', 'products/all');

Route::get('/products/all', 'AllProductsListingController@index');
Route::get('/products/{category}/{product}/buy', 'ProductsController@index')->name('products.index');
Route::get('/products/{category}', 'CategoryProductsListingController@index')->name('category.products.index');

// Api Routes.
Route::namespace('Api')->prefix('api/v1')->name('api.')->group(function () {
    Route::get('/products/all', 'AllProductsListingController@index')->name('products.all.index');
    Route::get('/products/{category}', 'CategoryProductsListingController@index')->name('category.products.index');
    Route::post('/wishlist/', 'WishListController@store')->name('wishlist.store');
});

Auth::routes();
