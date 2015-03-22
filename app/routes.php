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



/*
Rutas para Inicio y cierre de sesión
CU-01
*/

//Ruta para inicio de sesión
Route::get('login', 'UserController@login');


//Ruta para cierre de sesión
Route::get('logout', 'UserController@logout');




//Ruta de redirección en inicio de sesión
Route::post('store', 'UserController@store');

//Ruta para carga de vista register
//Route::get('register', 'RegisterController@register');






//Rutas para registrar usuarios

Route::get('/register', function()
{	
	return View::make('register');
});
Route::controller('register','RegisterController');
Route::post('register-user','RegisterController@register');


Route::get('/upcomingTrips', function()
{
	return View::make('upcoming-trips');
});

Route::get('/sendItem', function()
{
	return View::make('send-item');
});

Route::get('/postTrip', function()
{
	return View::make('post-trip');
});

Route::get('/profile', function()
{
	return View::make('profile');
});

Route::get('/edit-profile', function()
{
	return View::make('edit-profile');
});


/*Route::get("/request", function(){
	return View::make('user/request');
});

Route::get("/reset/{token}", function(){
	return View::make('user/reset');
});*/


/*Route::post('request', 'RemindersController@request');
Route::post('reset', 'RemindersController@reset');*/
Route::any("/request", [
 "as" => "user/request",
 "uses" => "RemindersController@request"
]);
 
Route::any("/reset/{token}", [
 "as" => "user/reset",
 "uses" => "RemindersController@reset"
]);


Route::get('ejemploModelo', function()
{
	// Poner el ID de un usuario de su DB.
	$user_id = 3;

	$user = User::find($user_id);

	$res = '<h1>User</h1>';
	$res .= $user->email . '</br>';
	$res .= Hash::check('12345', $user->password) . '</br>';
	$res .= $user->name . '</br>';
	$res .= $user->last_name . '</br>';
	$res .= $user->phone . '</br>';
	$res .= $user->birthdate . '</br>';
	$res .= $user->city . '</br>';

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
		$res .= $pack->fromCity . '</br>';
		$res .= $pack->toCity . '</br>';
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
		$res .= $trip->departureCity . '</br>';
		$res .= $trip->arrivalCity . '</br>';
		$res .= $trip->messages . '</br>';
		$res .= $trip->requests . '</br>';
		$res .= $trip->comment->first() . '</br>';

		$res .= '<h3>Associated Packs</h3>';
		$res .= $trip->packs . '</br>';
	}


	return $res;
});
