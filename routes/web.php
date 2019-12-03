<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'BookshopHomeController@index')->name('bookshop.home');

Route::get('/all-books', 'BookshopHomeController@allBooks')->name('all-books');
Route::get('/discount-books', 'BookshopHomeController@discountBooks')->name('discount-books');
Route::get('/category/{category}', 'BookshopHomeController@category')->name('category');
Route::get('/author/{author}', 'BookshopHomeController@author')->name('author');

Route::get('/book/{book}', 'BookshopHomeController@bookDetails')->name('book-details');

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/

Route::group(['middleware' => 'admin'], function (){
    Route::get('/admin-home', 'Admin\AdminBaseController@index')->name('admin.home');
    Route::resource('/admin/books', 'Admin\AdminBooksController');
    Route::resource('/admin/categories', 'Admin\AdminCategoriesController');
    Route::resource('/admin/authors', 'Admin\AdminAuthorsController');
    Route::resource('/admin/users', 'Admin\AdminUsersController');
});

Route::group(['middleware' => 'user'], function (){
    Route::get('/user-home', 'Users\UsersBaseController@index')->name('user.home');
});

Route::get('/logout', 'CustomLogoutController@logout')->name('logout');
