<?php


Auth::routes();

Route::redirect('/', 'products');
Route::get('/products', 'ProductsController@index');
Route::get('/products/{category}', 'CategoryProductsController@index')->name('category.products.index');
