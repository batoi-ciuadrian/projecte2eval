<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/login/facebook', 'Auth\LoginController@redirectToFacebookProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderFacebookCallback');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('catalog', 'CatalogController@getIndex');
    Route::get('catalog/show/{id}', 'CatalogController@getShow');
    Route::get('catalog/create', 'CatalogController@getCreate')->middleware('auth', 'role:admin');
    Route::post('catalog/create', 'CatalogController@postCreate');
    Route::get('catalog/edit/{id}', 'CatalogController@getEdit')->middleware('auth', 'role:admin');
    Route::put('catalog/edit/{id}', 'CatalogController@putEdit');
    Route::get('catalog/rent/{id}', 'CatalogController@putRent');
    Route::get('catalog/return/{id}', 'CatalogController@putReturn');
    Route::get('catalog/delete/{id}', 'CatalogController@deleteMovie')->middleware('auth', 'role:admin');
    Route::get('genre', 'GenreController@getGenres');
    Route::get('genre/edit/{id}', 'GenreController@getEdit')->middleware('auth', 'role:admin');
    Route::put('genre/edit/{id}', 'GenreController@putEdit');
    Route::get('genre/delete/{id}', 'GenreController@deleteGenre')->middleware('auth', 'role:admin');
    Route::post('genre/create', 'GenreController@postCreate');
    Route::get('genre/create', 'GenreController@getCreate')->middleware('auth', 'role:admin');
    Route::get('catalog/genre/{id}','CatalogController@getGenre'); 
    Route::get('catalog/rented', 'CatalogController@getRentedMovies')->middleware('auth', 'role:admin');
    Route::get('catalog/history', 'CatalogController@getRentHistory')->middleware('auth', 'role:admin');
    Route::get('account/rented', 'AccountController@getRentedMovies');
    Route::get('account/history', 'AccountController@getRentHistory');
});
