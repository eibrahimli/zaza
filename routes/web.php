<?php

use GuzzleHttp\Psr7\Request;
use function foo\func;

Route::group(['prefix' => 'admin', 'middleware' => 'onlyadmin'], function () {

        Route::get('/', function () {
            return view('backend.index');
        });        

        Route::get('ayarlar','AdminController@index')->name('admin.ayarlar');
        Route::post('ayarlar/{ayarlar}', 'AdminController@update');

        // İstifadəçilər bölümü rotaları

        Route::get('users','AdminUserController@index');
        Route::get('users/add', 'AdminUserController@create');
        Route::post('users', 'AdminUserController@store');
        Route::get('users/{user}','AdminUserController@show');
        Route::patch('users/{user}', 'AdminUserController@update');
        Route::delete('users/{user}', 'AdminUserController@destroy');

        //Elanlar bolumu rotaları

        Route::get('elan', 'ElanlarController@index');
        Route::get('elan/p','ElanlarController@indexP');
        Route::get('elansil/{elan}', 'ElanlarController@elanSil');
        Route::get('elanactive/{elan}', 'ElanlarController@elanActive');
        Route::get('elan/add','ElanlarController@create');
        Route::post('elan', 'ElanlarController@store');
        Route::get('elan/{elan}', 'ElanlarController@show');
        Route::patch('elan/{elan}', 'ElanlarController@update');
        Route::delete('elan/{elan}', 'ElanlarController@destroy');
        Route::get('elangallerydel/{photo}', 'ElanlarController@destroyElanGallery');

        // Elan Kateqoriyaları rotaları

        Route::get('elankat', 'CategoryController@index');
        Route::get('elankat/add', 'CategoryController@create');
        Route::post('elankat', 'CategoryController@store');
        Route::get('elankat/{category}', 'CategoryController@edit');
        Route::patch('elankat/{category}', 'CategoryController@update'); // ? optional laravel docu da baxx !!!
        Route::get('elankat/sil/{category}', 'CategoryController@destroy');

        // Bütün view lara menu dəyişənini verir
        View::composer(['backend/*'], 'App\Http\Controllers\AdminController@shareMenuToAllViews');
    });

Route::group(['prefix' => 'main'], function () {
    Route::get('/', 'SiteController@index');
});

Route::get('/', function() {
    return view('cons');
});

Route::post('subcat','SiteController@getSubCat');

Route::get('contact', 'ContactFormController@index');
Route::post('contact', 'ContactFormController@create');
Route::get('elan/{elan}-{slug}','SiteController@show');
Route::get('elanlar', 'SiteController@elanlar')->name('elanlar');
Route::get('elan/create', 'SiteController@elanCreate')->name('elanlar.create');
Route::post('elan/store', 'SiteController@elanStore')->name('elanlar.store');
Route::any('axtar', 'SiteController@elanAxtar');
Route::get('elanlar/{asc}','SiteController@elanlarAsc')->name('elanlar.asc');
Route::get('kateqoriya/{cat}-{slug}','SiteController@catIndex');
Route::get('kateqoriya/{cat}-{slug}/asc','SiteController@catAscIndex')->name('kateqoriya.asc');
Route::any('kateqoriya/axtar/{cat}', 'SiteController@katAxtar')->name('kateqoriya.axtar');
Route::group(['prefix' => 'user', 'middleware' => 'auth'],function() {
    Route::get('{user}','ProfileController@index')->name('user.index');
    Route::get('{user}/edit','ProfileController@edit')->name('user.edit');
    Route::patch('{user}', 'ProfileController@update')->name('user.update');
    Route::get('{user}/sil', 'ProfileController@destroy')->name('user.destroy');
    Route::get('{user}/elanedit/{elan}','ProfileController@elanedit')->name('user.elanedit');
    Route::patch('{user}/elan/{elan}', 'ProfileController@elanUpdate')->name('user.elanUpdate');
    Route::get('{user}/elansil/{elan}','ProfileController@elanSil')->name('user.elansil');
    Route::get('{user}/elangallerysil/{elan}','ProfileController@elangallerysil')->name('user.elangallerysil');
});

Auth::routes();


