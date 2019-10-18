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

Route::get('/', 'MainController@index')->name('home')->middleware('auth');
Route::get('/files/{type}/{id?}', 'FileController@index');

Route::post('files/add', 'FileController@store');
Route::post('files/edit/{id}', 'FileController@edit');
Route::post('files/delete/{id}', 'FileController@destroy');

Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/channelpage', 'ChannelController@channelpage');

Route::get('/teledrama', 'TeledramaController@index');
Route::post('/teledrama',[
    'uses'=>'TeledramaController@create',
    'as'=>'teledrama'
]);


Route::get('/episode', 'EpisodeController@index');
Route::post('/episode',[
    'uses'=>'EpisodeController@create',
    'as'=>'episode'
]);

Route::get('/channel', 'ChannelController@index');
Route::post('/channel', [
    'uses'=>'ChannelController@create',
    'as'=>'channel'
]);




