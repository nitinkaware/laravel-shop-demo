<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/{category}', 'ProductsController@index')->name('products.index');
