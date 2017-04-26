<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/bridge', function() {
    $pusher = App::make('pusher');
    $pusher->trigger( 'my-channel','my-event', array('text' => 'Preparing the Pusher Laracon.eu workshop!'));
    return view('welcome');
});
Route::any('notifications', 'NotificationController@getIndex');
Route::post('notifications/notify', 'NotificationController@postNotify');