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

//Ruta de presentación Ridepack

Route::get('/', function()
{
	return View::make('hello');
});


/* 
|------------------------
|Nos indica que las rutas que están dentro de este grupo 
|sólo serán mostradas si el usuario se ha autenticado.
|------------------------
*/
Route::group(array('before' => 'auth'), function()
{
    
    //Ruta para cierre de sesión
	Route::get('logout', 'UserController@logout');

	/*
	Ruta para visualizar información
	CU-08
	*/
	//Ruta para visualizar la información del usuario
	Route::get('/profile', function()
	{
	return View::make('profile');
	});

	/*
	Ruta para visualizar información de otro usuario
	CU-03 y CU-04
	*/
	//Ruta para visualizar la información del usuario 
	Route::get('/users/{user_id}','UsersProfileController@showUserProfile');


	Route::get('/post_travel', function()
	{
		return View::make('post_travel');
	});

	Route::post('/post_travel', 'TripController@createTrip');

	Route::get('/post_package', function()
	{
		return View::make('post_package');
	});

	Route::post('/post_package', 'PackageController@createPack');

	Route::get('/edit_package/{id}', 'PackageController@showUpdatePack');
	Route::post('/edit_package/{id}', 'PackageController@updatePack');
    
    //Eliminar esta ruta despues de pasar la información de esta vista a la vista profile - Para: Yussel
	Route::get('/editProfile', function()
	{
		return View::make('edit-profile');
	});

	Route::post('/editProfile', 'UserController@updateUser');

	Route::get('/deleteUser', 'UserController@deleteUser');

	Route::get('/handle_request', function()
	{
		return View::make('handle_requests');
	});

	Route::get('/package_details', function()
	{
		return View::make('package_details');
	});

	Route::post('/package_details', 'PackageDetailsController@sendMessage');
	

	Route::get('/trip_details', function()
	{
		return View::make('trip_details');
	});

	Route::post('/trip_details', 'TripDetailsController@sendMessage');
    
});
/*
Rutas para Inicio y cierre de sesión
CU-01
*/

//Ruta para inicio de sesión
Route::get('login', 'UserController@showLogin');


//Ruta de redirección en inicio de sesión
Route::post('search', 'UserController@login');




//Ruta para carga de vista register
//Route::get('register', 'RegisterController@register');






//Rutas para registrar usuarios

Route::get('/register', function()
{	
	return View::make('register');
});
Route::controller('register','RegisterController');
Route::post('register-user','RegisterController@register');


Route::get('/search', function()
{
	return View::make('search');
});

Route::get('/management', function()
{
	return View::make('management');
});



/*
 Rutas para recuperar y reiniciar contraseña
 CU-16
 */
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

?>