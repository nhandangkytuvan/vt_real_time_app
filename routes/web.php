<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/bridge', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
                      'test-event', 
                      array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/loginFacebook', 'SocialAuthController@loginFacebook');
Route::get('/loginCallbackFacebook', 'SocialAuthController@loginCallbackFacebook');
Route::get('/loginGithub', 'SocialAuthController@loginGithub');
Route::get('/loginCallbackGithub', 'SocialAuthController@loginCallbackGithub');

Route::any('activities', 'ActivityController@getIndex');
Route::any('activities/status-update', 'ActivityController@postStatusUpdate');
Route::any('activities/like', 'ActivityController@postLike');