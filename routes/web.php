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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');
});

Route::get('document/get-champs-specifiques', 'DocumentController@getChampsSpecifiques')->name('api.champs.specifiques');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
    Route::get('typedocument/{id}/champ/create', ['as' => 'typedocument.champ.create', 'uses' => 'TypeDocumentController@createChamp']);
	Route::resource('typedocument','TypeDocumentController');
	Route::resource('champ','ChampSpecifiqueController');
	Route::resource('document','DocumentController');
	Route::resource('role','RoleController');
	Route::resource('userRole','UserRoleController');

});

