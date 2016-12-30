<?php

Route::group(['prefix'=>'pi/notifications', 'middleware' => ['web', 'dev']], function($router) {
  $router->get('/get/{type}','\PureIntellect\Notifications\Controllers\NotificationController@get');

  $router->get('/notifications', '\PureIntellect\Notifications\Controllers\NotificationController@all');
  $router->post('/notifications', '\PureIntellect\Notifications\Controllers\NotificationController@store');
  $router->put('/notifications/{notification_id}', '\PureIntellect\Notifications\Controllers\NotificationController@update');
  $router->delete('/notifications/{notification_id}','\PureIntellect\Notifications\Controllers\NotificationController@destroy');

});
