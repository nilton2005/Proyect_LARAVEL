<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','contentController@getHome' )->name('home');
// Module Auth
Route::get('/login', 'ConnectController@getLogin')->name('login');
Route::post('/login', 'ConnectController@postLogin')->name('login');
Route::get('/recover', 'ConnectController@getRecover')->name('recover');
Route::post('/recover', 'ConnectController@postRecover')->name('recover');
Route::get('/reset', 'ConnectController@getReset')->name('reset');
Route::post('/reset', 'ConnectController@postReset')->name('reset');
Route::get('/register', 'ConnectController@getRegister')->name('register');
Route::post('/register', 'ConnectController@postRegister')->name('register');
Route::get('/logout', 'ConnectController@getLogout')->name('logout');


// Module products

Route::get('/product/{id}/{slug}','ProductController@getProduct');

// Module  action

Route::get('/account/edit', 'UserController@getAccount')->name('account_edit');
Route::post('/account/edit/avatar', 'UserController@postAccountAvatar')->name('account_avatar_edit');
Route::post('/account/edit/password','UserController@postAccountPassword')->name('account_password_edit');
Route::post('/account/edit/info','UserController@postAccountInfo')->name('account_info_edit');

// Anai
Route::get('/about_us', function(){
    return view('actions/about_us');
});
// Ajax Apli Routers



Route::get('/mk/api/load/products/{section}','ApiJsController@getProductsSection');
Route::post('/mk/api/load/user/favorites','ApiJsController@postUserFavorites');
Route::post('/mk/api/favorites/add/{object}/{module}','ApiJsController@postFavoriteAdd');



Route::get('/puntos-de-recojo', 'PuntoRecojoController@index')->name('puntos.de.recojo');
