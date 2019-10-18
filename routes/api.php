<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//channel

//Route::post('/channel','ChannelController@create');

Route::get('/channels','ChannelController@show');

Route::get('/channel/{id}','ChannelController@showbyid');

Route::put('/channelupdate/{id}','ChannelController@updatebyid');

Route::delete('/channeldelete/{id}','ApiController@deletebyid');

//teledrama

//Route::post('/teledrama','TeledramaController@create');

Route::get('/teledramas/{ch_Id}','TeledramaController@show');

Route::get('/teledrama/{id}','TeledramaController@showbyid');

Route::put('/teledramaupdate/{id}','TeledramaController@updatebyid');

Route::delete('/teledramadelete/{id}','TeledramaController@deletebyid');

//episode

//Route::post('/episode','EpisodeController@create');

Route::get('/episodes/{te_Id}','EpisodeController@show');

Route::get('/episode/{id}','EpisodeController@showbyid');

Route::put('/episodeupdate/{id}','EpisodeController@updatebyid');

Route::delete('/episodedelete/{id}','EpisodeController@deletebyid');
