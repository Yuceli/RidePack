<?php
Route::post('/users/store', 'UsersController@store');
Route::post('/users/update/{id}', 'UsersController@update');
Route::get('/users/destroy/{id}', 'UsersController@destroy');

Route::controller('users', 'UsersController');