<?php

// FRONTEND


Route::group(['prefix' => 'registracija'], function () {
    Route::get('imone', 'FrontendController@company');
    Route::post('{type}/store', 'FrontendController@store');
});

Route::get('search/autocomplete', 'FrontendController@autocomplete');

Route::get('/', function () {
});

// BACKEND

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', 'AdminController@index');

    Route::resource('categories', 'CategoriesController');

    Route::group(['prefix' => 'categories'], function () {

        Route::get('{category}/facilities', 'FacilitiesController@index');
        Route::get('{category}/facilities/create', 'FacilitiesController@create');
        Route::post('{category}/facilities/store', 'FacilitiesController@store');
        Route::get('facilities/{id}/edit', 'FacilitiesController@edit');
        Route::post('facilities/{id}/update', 'FacilitiesController@update');
        Route::post('facilities/{id}/destroy', 'FacilitiesController@destroy');

    });

    Route::resource('organizations', 'OrganizationsController');

});