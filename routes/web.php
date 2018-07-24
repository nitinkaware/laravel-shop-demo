<?php
Route::redirect('/', 'products/all');

Auth::routes();

Route::get('/products/all', 'AllProductsListingController@index');
Route::get('/products/{category}/{product}/buy', 'ProductsController@index')->name('products.index');
Route::get('/products/{category}', 'CategoryProductsListingController@index')->name('category.products.index');
Route::get('my/wishlist/', 'WishListController@index')->name('wishlist.index');