<?php


Route::prefix('/admin')->group(function(){
    Route :: get('/', 'Admin\DashboardController@getDashboard');
    Route::get('/users', 'Admin\UserController@getUsers');
    // Module Products
    Route::get('/products','Admin\ProductController@getHome');
    Route::get('/product/add','Admin\ProductController@getProductAdd');
    Route::get('/product/{id}/edit','Admin\ProductController@getProductEdit');
    Route::post('/product/add', 'Admin\ProductController@postProductAdd');
    Route::post('/product/{id}/edit', 'Admin\ProductController@postProductEdit');
    Route::post('/product/{id}/gallery/add', 'Admin\ProductController@postProductGalleryAdd');

    // Module Categories
    Route::get('/categories/{module}', 'Admin\CategoriesController@getHome');
    Route::post('/category/add','Admin\CategoriesController@postCategoryAdd');
    Route::get('/category/{id}/edit', 'Admin\CategoriesController@getCategoryEdit');
    Route::post('/category/{id}/edit', 'Admin\CategoriesController@postCategoryEdit');
    Route::get('/category/{id}/delete', 'Admin\CategoriesController@getCategoryDelete');
});