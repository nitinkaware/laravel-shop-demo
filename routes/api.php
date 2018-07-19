<?php

Route::namespace('Api')->prefix('v1')->name('api.')->group(function () {
    Route::get('/products/all', 'AllProductsListingController@index')->name('products.all.index');
    Route::get('/products/{category}/{product}/buy', 'ProductsController@index')->name('products.index');
    Route::get('/products/{category}', 'CategoryProductsListingController@index')->name('category.products.index');
});