<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'front', 'as' => 'front.'], function () {
    Route::get('/', 'PostController@index')->name('index');
    Route::get('/article/{slug}', 'PostController@show')->name('article');
    Route::get('/category/{slug}', 'CategoryController@show')->name('category');
    Route::get('/tag/{slug}', 'TagController@show')->name('tag');
    Route::match(['get', 'post'],'/contact', 'ContactController@contact')->name('contact');
    Route::get('/search', 'SearchController@search')->name('search');
});

Route::group(['namespace' => 'admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
});

Route::group(['namespace' => 'security', 'middleware' => 'guest'], function() {
    Route::get('/register', 'UserController@registerForm')->name('registerForm');
    Route::post('/register', 'UserController@register')->name('register');
    Route::get('/login', 'UserController@loginForm')->name('loginForm');
    Route::post('/login', 'UserController@login')->name('login');
});

Route::group(['namespace' => 'security', 'middleware' => 'auth'], function () {
    Route::get('/logout', 'UserController@logout')->name('logout');
});
