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

	Route::post('/users/{user_id}', array(
		'as' => 'users',
		'uses' => 'UsersProfileController@sendMessage'
	));
	/*
	 *	Ruta para buscar paquetes y viajes.
	 *	CU-05 y CU-06
	 */
	Route::post('/search', 'SearchController@search');

	/*
	 * Ruta para visualizar información del usuario.
	 * CU-07
	 */
	Route::get('/profile', 'UserController@showMyProfile');

	/*
	 *	Rutas para editar el perfil de usuario.
	 *	CU-07
	 */
	Route::get('/edit/profile', 'UserController@showUpdateUser');

	Route::post('/edit/profile', 'UserController@updateUser');

	/*
	 *	Rutas para eliminar la cuenta de un usuario.
	 *	CU-07
	 */
	Route::post('/deleteUser', 'UserController@deleteUser');

	/*
	 * Rutas para publicar un viaje.
	 * CU-08
	 */
	Route::get('/post/travel', 'TripController@showPostTrip');

	Route::post('/post/travel', 'TripController@createTrip');

	/*
	 * Rutas para publicar un paquete.
	 * CU-09
	 */
	Route::get('/post/package', 'PackController@showPostPack');

	Route::post('/post/package', 'PackController@createPack');

	/*
	 * Rutas para editar un paquete.
	 * CU-17
	 */
	Route::get('/edit/package/{id}', 'PackController@showUpdatePack');
	
	Route::post('/edit/package/{id}', 'PackController@updatePack');
    
	/*
	 * Rutas para editar un viaje.
	 * CU-22
	*/
	Route::get('/edit/travel/{id}', 'TripController@showUpdateTrip');
	
	Route::post('/edit/travel/{id}', 'TripController@updateTrip');

	/*
	 *	Ruta para ver los últimos paquetes registrados.
	 *	CU-26
	 */
	Route::get('/upcoming/packages', 'SearchController@showLastPacks');

	/*
	 *	Ruta para ver los últimos viajes registrados.
	 *	CU-27
	 */
	Route::get('/upcoming/trips', 'SearchController@showLastTrips');
    

	/*
	 *	Ruta para aceptar o rechazar solicitudes.
	 *	CU-15
	 *  CU-20
	 */
	Route::get('/handle/request', 'HandleRequestsController@showWelcome');

	/*
	 *	Ruta par ver los detalles de un paquete.
	 *	CU-19
	 */
	Route::get('/package/details/{id}', 'PackController@showDetails');

	Route::post('/package/details/{id}', 'PackController@sendRequest');
	
	/*
	 *	Ruta para ver los detalles de un viaje.
	 *  CU-28
	 */
	Route::get('/trip/details/{id}', 'TripController@showDetails');

	Route::post('/trip/details/{id}', 'TripController@sendRequest');

	/*
	 * Ruta par eliminar un viaje
	 * CU-23
	 */
    Route::post('/DeleteTrip', 'TripController@deleteTrip');

	/*
	 * Ruta par eliminar un paquete
	 * CU-23
	 */
    Route::post('/DeletePack', 'PackController@DeletePack');

	Route::get('/management', 'ManagementController@showManagement');

	/*
	 *Ruta para aceptar una petición de paquete, Ruta para aceptar una solicitud de viaje
	 *CU-15.ResponderPeticiónAPaquetesv1.0, CU-20.ResponderPeticionRealizadaAlViajev1.0
	*/
	Route::post('/handle/request/accpet/{id}', 'HandleRequestsController@acceptRequest');

	/*
	 *Ruta para rechazar una petición de paquete, Ruta para rechazar una solicitud de viaje
	 *CU-15.ResponderPeticiónAPaquetesv1.0, CU-20.ResponderPeticionRealizadaAlViajev1.0
	*/
	Route::post('/handle/request/refuse/{id}', 'HandleRequestsController@refuseRequest');


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
Route::get('/register', 'RegisterController@showUserRegister');

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