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

// Cart Route
Route::post('/cart/add', 'ShoppingCartController@add_to_cart')->name('cart.add');
Route::get('/cart/page', 'ShoppingCartController@cart')->name('cart');
Route::get('/cart/delete/{id}', 'ShoppingCartController@cart_delete')->name('cart.delete');
Route::get('/cart/increment/{id}/{qty}/{book_id}', 'ShoppingCartController@cart_increment')->name('cart.increment');
Route::get('/cart/decrement/{id}/{qty}', 'ShoppingCartController@cart_decrement')->name('cart.decrement');
// End of cart route

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/

// Admin Route group
Route::group(['middleware' => 'admin'], function (){
    Route::get('/admin-home', 'Admin\AdminBaseController@index')->name('admin.home');

    Route::put('/admin/books/restore/{id}', 'Admin\AdminBooksController@restore')
        ->name('book.restore');
    Route::delete('admin/books/forceDelete/{id}', 'Admin\AdminBooksController@forceDelete')
        ->name('book.forceDelete');
    Route::get('/trash-books', 'Admin\AdminBooksController@trashBooks')
        ->name('admin.trash-books');
    Route::get('admin/discount-books', 'Admin\AdminBooksController@discountBooks')->name('admin.discountBooks');

    Route::resource('/admin/books', 'Admin\AdminBooksController');
    Route::resource('/admin/categories', 'Admin\AdminCategoriesController');
    Route::resource('/admin/authors', 'Admin\AdminAuthorsController');
    Route::resource('/admin/users', 'Admin\AdminUsersController');
});
// End of admin route

// Users route group
Route::group(['middleware' => 'user'], function (){
    Route::get('/user-home', 'Users\UsersBaseController@index')->name('user.home');
});
// End of users route

Route::get('/logout', 'CustomLogoutController@logout')->name('logout');
