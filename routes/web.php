<?php


Auth::routes();

Route::get('/t', function() {
    return \App\Product::mostOrderedProducts();
});
Route::redirect('/', 'products/all');
Route::get('/products/all', 'AllProductsListingController@index');
Route::get('/products/{category}/{product}/buy', 'ProductsController@index')->name('products.index');
Route::get('/products/{category}', 'CategoryProductsListingController@index')->name('category.products.index');
