<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = User::all();

		return View::make('user.index')->with('user', $user);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array (
			'name'  => 'required',
			'email' => 'required|email',
			'level' => 'required|numeric'
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('nerds/create')->withErrors($validator)->withInput(Input::except('password'));
		}
		else{
			$user = new User;
			$user->name   = Input::get('name');
			$user->email  = Input::get('email');
			$user->level  = Input::get('level');
			$user->save();

			Session::flash('message', 'Usuario creado con exito');
			return Redirect::to('user');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = user::find($id);
		return View::make('user.show')->with('user', $user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return View::make('user.edit')->with('user', $user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'name'  => 'required',
			'email' => 'required|email',
			'level' => 'required|numeric'
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('user/' . $id . '/edit')->withErrors($validator)->withInput(Input::except('password'));
 		}else
 		{
 			$user = User::find($id);
 			$user->name   = Input::get('name');
 			$user->email  = Input::get('email');
 			$user->level  = Input::get('level');
 			$user->save();

 			Session::flash('message', 'Los cambios han sido guardados');
 			return Redirect::to('user');
 		}

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = User::find($id);
		$user->delete();

		Session::flash('message', 'Usuario eliminado con exito');
		return Redirect::to('user');
	}


}
