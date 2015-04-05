<?php 


class PackageController extends BaseController {

 
	public function createPack()
	{
		$rules = array(
			'title' => 'max:60|required',
			'sending_date' => 'date|date_format:Y-m-d|required',
			'arrival_date' => 'date|date_format:Y-m-d|required',
			'reward' => 'numeric|min:0',
			'volume' => 'numeric|required',
			'weight' => 'numeric|min:0|required',
			'observation' => 'max:100',
			'from_city' => 'required',
			'to_city' => 'required',
			'pack_picture'=>'image'
		);

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput(Input::except('pack_picture'));
	    }

	    $pack = new Pack;

	    $pack->title = Input::get('title');
	    $pack->sending_date = Input::get('sending_date');
	    $pack->arrival_date = Input::get('arrival_date');
	    $pack->reward = Input::get('reward');
	    $pack->volume = Input::get('volume');
	    $pack->weight = Input::get('weight');
	    $pack->observation = Input::get('observation');
	    $pack->status = 'onhold';
	    $pack->from_city = Input::get('from_city');
	    $pack->to_city = Input::get('to_city');

	    $user = Auth::user();

	    if( Input::hasFile('pack_picture') ){

	    	$uploadedFile = Input::file('pack_picture');

	    	if( $uploadedFile->isValid() ){

	    		$destinantionPath = public_path($user->getImagesPath());

	    		if( File::exists($destinantionPath.'/'.$uploadedFile->getClientOriginalName()) ){

	    			return Redirect::back()->withErrors(array('pack_picture'=>'Ya existe una imagen con ese nombre.'))->withInput(Input::except('pack_picture'));
	    		}

				$uploadedFile->move($destinantionPath , $uploadedFile->getClientOriginalName());

				$pack->picture = $user->getImagesPath() .'/'. $uploadedFile->getClientOriginalName();
	    	}
	    }
	    
	    $user->packs()->save($pack);

		return Redirect::to('package_details/'/*.$pack->id*/)->withMessage('Paquete publicado.');
	}

	public function deletePack($id)
	{
		
	}

	public function updatePack($id)
	{
		$user = Auth::user();
		$pack = $user->packs()->find($id);


		if(!$pack){
			App::abort(404);
		}

		$rules = array(
			'title' => 'max:60|required',
			'sending_date' => 'date|date_format:Y-m-d|required',
			'arrival_date' => 'date|date_format:Y-m-d|required',
			'reward' => 'numeric|min:0',
			'volume' => 'numeric|required',
			'weight' => 'numeric|min:0|required',
			'observation' => 'max:100',
			'from_city' => 'required',
			'to_city' => 'required',
			'pack_picture'=>'image'
		);

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails())
	    {
	        return Redirect::back()->withErrors($validator)->withInput(Input::except('pack_picture'));
	    }

	    $pack->title = Input::get('title');
	    $pack->sending_date = Input::get('sending_date');
	    $pack->arrival_date = Input::get('arrival_date');
	    $pack->reward = Input::get('reward');
	    $pack->volume = Input::get('volume');
	    $pack->weight = Input::get('weight');
	    $pack->observation = Input::get('observation');
	    $pack->from_city = Input::get('from_city');
	    $pack->to_city = Input::get('to_city');

	    

	    if( Input::hasFile('pack_picture') ){

	    	$uploadedFile = Input::file('pack_picture');

	    	if( $uploadedFile->isValid() ){

	    		$destinantionPath = public_path($user->getImagesPath());

	    		if( File::exists($destinantionPath.'/'.$uploadedFile->getClientOriginalName()) ){

	    			return Redirect::back()->withErrors(array('pack_picture'=>'Ya existe una imagen con ese nombre.'))->withInput(Input::except('pack_picture'));
	    		}

				$uploadedFile->move($destinantionPath , $uploadedFile->getClientOriginalName());

				$pack->picture = $user->getImagesPath() .'/'. $uploadedFile->getClientOriginalName();
	    	}
	    }
	    
	    $pack->save();

		return Redirect::to('package_details/'/*.$pack->id*/)->withMessage('Paquete modificado.');
	}

	public function getPack($id)
	{
		
	}


	public function showUpdatePack($id = 0){
		$pack = Auth::user()->packs()->find($id);

		if(!$pack){
			App::abort(404);
		}

		//return View::make('edit_package')->withPack($pack);
		return $pack;
	}

}
?>