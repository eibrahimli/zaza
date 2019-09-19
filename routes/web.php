<?php

    Route::group(['prefix' => 'admin'], function () {

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

    Route::get('/', 'SiteController@index');



