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

Route::get('/', array( 'before' => 'guest', function()
{
	return View::make('hello');
}));


/* 
|------------------------
|Nos indica que las rutas que están dentro de este grupo 
|sólo serán mostradas si el usuario se ha autenticado.
|------------------------
*/
Route::group(array('before' => 'auth'), function()
{
    
    /*
     * Ruta para cerrar sesión.
	 * CU-02
     */
	Route::get('logout', 'UserController@logout');

	/*
	 * Ruta para visualizar información de otro usuario.
	 * CU-04
	 */
	Route::get('/users/{user_id}','UsersProfileController@showUserProfile');

	/*
	 *	Ruta para buscar paquetes y viajes.
	 *	CU-05 y CU-06
	 */
	Route::post('/search', 'SearchController@search');

	/*
	 * Ruta para visualizar información del usuario.
	 * CU-07
	 */
	Route::get('/profile', function()
	{
		return View::make('profile');
	});

	/*
	 *	Rutas para editar el perfil de usuario.
	 *	CU-07
	 */
	Route::get('/editProfile', function()
	{
		return View::make('edit-profile');
	});

	Route::post('/editProfile', 'UserController@updateUser');

	/*
	 *	Rutas para eliminar la cuenta de un usuario.
	 *	CU-07
	 */
	Route::get('/deleteUser', 'UserController@deleteUser');

	/*
	 * Rutas para publicar un viaje.
	 * CU-08
	 */
	Route::get('/post_travel', function()
	{
		return View::make('post_travel');
	});

	Route::post('/post_travel', 'TripController@createTrip');

	/*
	 * Rutas para publicar un paquete.
	 * CU-09
	 */
	Route::get('/post_package', function()
	{
		return View::make('post_package');
	});

	Route::post('/post_package', 'PackageController@createPack');

	/*
	 * Rutas para editar un paquete.
	 * CU-17
	 */
	Route::get('/edit_package/{id}', 'PackageController@showUpdatePack');
	
	Route::post('/edit_package/{id}', 'PackageController@updatePack');
    
	/*
	 * Rutas para editar un viaje.
	 * CU-22
	*/
	Route::get('/edit_travel/{id}', 'TripController@showUpdateTrip');
	
	Route::post('/edit_travel/{id}', 'TripController@updateTrip');

	/*
	 *	Ruta para ver los últimos paquetes registrados.
	 *	CU-26
	 */
	Route::get('/upcoming-packages', 'SearchController@showLastPacks');

	/*
	 *	Ruta para ver los últimos viajes registrados.
	 *	CU-27
	 */
	Route::get('/upcoming-trips', 'SearchController@showLastTrips');
    

	/*
	 *	Ruta para aceptar o rechazar solicitudes.
	 *	CU-15
	 *  CU-20
	 */
	Route::get('/handle_request', function()
	{
		return View::make('handle_requests');
	});

	/*
	 *	Ruta par ver los detalles de un paquete.
	 *	CU-19
	 */
	Route::get('/package_details/{id}', 'PackageDetailsController@showDetails');

	Route::post('/package_details', 'PackageDetailsController@sendMessage');
	
	/*
	 *	Ruta para ver los detalles de un viaje.
	 *  CU-28
	 */
	Route::get('/trip_details', function()
	{
		return View::make('trip_details');
	});

	Route::post('/trip_details', 'TripDetailsController@sendMessage');

	Route::get('/management', 'ManagementController@index');
});


/*
 * Rutas para Inicio y cierre de sesión
 * CU-01
 */

//Ruta para mostrar inicio de sesión
Route::get('login', 'UserController@showLogin');

//Ruta para iniciar sesión
Route::post('login', 'UserController@login');


/*
 * Ruta para el registro de usuarios.
 * CU-03
 */
Route::get('/register', function()
{	
	return View::make('register');
});

Route::post('register-user','RegisterController@register');


/*
 * Rutas para recuperar y reiniciar contraseña
 * CU-16
 */
Route::any("/request", [
 "as" => "user/request",
 "uses" => "RemindersController@request"
]);
 
Route::any("/reset/{token}", [
 "as" => "user/reset",
 "uses" => "RemindersController@reset"
]);

?>