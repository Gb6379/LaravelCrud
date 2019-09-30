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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){//does the authentication, which means that you can only access these routes if you are logged in
    
    Route::get('/companies', 'CompanieController@index')->name('companies.list');//this is the path on the views, which mean companies is the folder and list is the list.blad.php
    Route::get('/companies/create', 'CompanieController@create')->name('companies.create');
    Route::post('/companies/create', 'CompanieController@store')->name('companies.store');
    Route::get('/companies/{id}/show', 'CompanieController@show')->name('companies.show');
    Route::get('/companies/{id}/edit', 'CompanieController@edit')->name('companies.edit');
    Route::put('/companies/{id}/edit', 'CompanieController@update')->name('companies.update');
    Route::delete('/companies/{id}', 'CompanieController@destroy')->name('companies.destroy');

    Route::get('/person', 'PersonController@index')->name('person.listPerson');
    Route::get('/person/create' , 'PersonController@create')->name('person.createPerson');
    Route::get('/person/{id}/edit', 'PersonController@edit')->name('person.editPerson');
    Route::put('/person/{id}/edit', 'PersonController@update')->name('person.update');
    Route::post('/person/create', 'PersonController@store')->name('person.store');
    Route::delete('/person/{id}', 'PersonController@destroy')->name('person.destroy');

   
    

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
