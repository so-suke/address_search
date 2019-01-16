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

Route::get('/', 'ActionController@top')->name('top');
Route::get('/cities_from_pref/{pref_name}', 'ActionController@cities_from_pref')->name('cities_from_pref');
Route::get('/streets_from_city/{pref_name}/{city_name}/', 'ActionController@streets_from_city')->name('streets_from_city');
Route::get('/complete_address/{id}/', 'ActionController@complete_address')->name('complete_address');

Route::get('/prefs_from_region/{region_name}/', 'ActionController@prefs_from_region')->name('prefs_from_region');

Route::post('/search_from_zipcode', 'ActionController@search_from_zipcode')->name('search_from_zipcode');
Route::post('/search_from_input', 'ActionController@search_from_input')->name('search_from_input');
