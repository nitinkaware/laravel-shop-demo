<?php

Route::namespace('Api')->prefix('v1')->name('api.')->group(function () {
    Route::get('/products', 'ProductsController@index')->name('products.index');
    Route::get('/products/{category}', 'CategoryProductsController@index')->name('category.products.index');
});