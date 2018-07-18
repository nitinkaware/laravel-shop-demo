<?php

Route::namespace('Api')->prefix('v1')->name('api.')->group(function () {
    Route::get('/products', 'CategoryController@index')->name('category.index');
    Route::get('/{category}', 'ProductsController@index')->name('products.index');
});