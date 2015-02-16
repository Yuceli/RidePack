<?php
$name= "proveedor 2";
//Route::get('users', 'UsersController@index');

Route::get('suppliers', 'SuppliersController@getSuppliers');
Route::get('suppliers/create', 'SuppliersController@create');
Route::get('suppliers/read/{name}', 'SuppliersController@read');
Route::get('suppliers/update/{id}', 'SuppliersController@update');
Route::get('suppliers/delete/{id}', 'SuppliersController@delete');

//Route::resource('users', 'UsersController');
//Route::get('/users', function()
//	{
//		$users= User::all();
//		return View::make('users/index') -> with('users', $users);
	
//	});

//Route::get('/users/{username}', function($username)
//	{
		//$users= User::all();
		//return View::make('users/index') -> with('users', $users);
//	$user = User::whereUsername($username)->first();
//	return View::make('users/detalle') -> with('user', $user);
//	});

//Route::get('info', 'PaginasController@info');
//Route::get('about', 'AboutController@about');

//Route::get('/hola', function()
//{

//return '<h2>Ya funcionan las rutas</h2>';
//});


//Route::get('usuario', function(){
//$usuario=User::find(1);
//return $usuario->email;
//});


Route::get('/', function()
{
	//Create a USER
//	$user = new User;
//	$user -> username= "Clemen";
//	$user -> password = Hash::make('12345');
//	$user -> save();

	//Create a User with CREATE
//	User::Create(
//	[
//		'username'=> "UsuarioCreate",
//		'password' => Hash::make('asdf')
//	]);

	//Update information
//$user = User::find(4);
//$user ->username = 'Sharon';
//$user -> save();

	//Delete information
//$user = User::find(8);
//$user -> delete();

	//$users = User::all();
	//$user = DB::table('users')->find(2);
	//$user = DB::table('users') -> where('username', '!=', 'karimy') -> get();
	//dd($user);
//return User::all();
});
