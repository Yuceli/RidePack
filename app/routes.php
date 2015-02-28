<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/login', function()
{
	return View::make('login');
});

Route::get('/register', function()
{	
	return View::make('register');
});

//Rutas para manejo de sesiones
Route::get('login', 'LoginController@showWelcome');
Route::post('store', 'LoginController@store');
Route::get('logout', 'LoginController@destroy');

//Rutas para registrar usuarios
Route::controller('register','RegisterController');
Route::post('register-user','RegisterController@register');


Route::get('ejemploModelo', function()
{
	$user_id = 7;

	$user = User::find($user_id);

	$res = '<h1>User</h1>';
	$res .= $user->email . '</br>';
	$res .= Hash::check('12345', $user->password) . '</br>';
	$res .= $user->name . '</br>';
	$res .= $user->last_name . '</br>';
	$res .= $user->phone . '</br>';
	$res .= $user->birthdate . '</br>';
	$res .= $user->city->name . '</br>';
	$res .= $user->city->country->name . '</br>';

	//Packs
	$res .= '<h1>Packs</h1>';

	foreach($user->packs as $pack)
	{
		$res .= $pack->title . '</br>';
		$res .= $pack->sending_date . '</br>';
		$res .= $pack->arrival_date . '</br>';
		$res .= $pack->reward . '</br>';
		$res .= $pack->volume . '</br>';
		$res .= $pack->weight. '</br>';
		$res .= $pack->observation . '</br>';
		$res .= $pack->status . '</br>';
		$res .= $pack->fromCity->name . '</br>';
		$res .= $pack->fromCity->country->name . '</br>';
		$res .= $pack->toCity->name . '</br>';
		$res .= $pack->toCity->country->name . '</br>';
		$res .= $pack->messages . '</br>';
		$res .= $pack->requests . '</br>';
		$res .= $pack->comment->first() . '</br>';

		$res .= '<h3>Associated Trips </h3>';
		$res .= $pack->trips . '</br>';
	}

	//Trip
	$res .= '<h1>Trips</h1>';

	foreach($user->trips as $trip)
	{
		$res .= $trip->departure_date . '</br>';
		$res .= $trip->arrival_date . '</br>';
		$res .= $trip->carry_reward . '</br>';
		$res .= $trip->max_volume . '</br>';
		$res .= $trip->max_weight. '</br>';
		$res .= $trip->observation . '</br>';
		$res .= $trip->transport . '</br>';
		$res .= $trip->departureCity->name . '</br>';
		$res .= $trip->departureCity->country->name . '</br>';
		$res .= $trip->arrivalCity->name . '</br>';
		$res .= $trip->arrivalCity->country->name . '</br>';
		$res .= $trip->messages . '</br>';
		$res .= $trip->requests . '</br>';
		$res .= $trip->comment->first() . '</br>';

		$res .= '<h3>Associated Packs</h3>';
		$res .= $trip->packs . '</br>';
	}


	return $res;
});
