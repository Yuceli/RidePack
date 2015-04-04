<?php 


class PackageController extends BaseController {


	public function createPack()
	{
		$rules = array(
			'title' => 'max:60|required',
			'sending_date' => 'date|date_format:Y-m-d|required',
			'arrival_date' => 'date|date_format:Y-m-d|required',
			'reward' => 'numeric',
			'volume' => 'numeric|required',
			'weight' => 'numeric|required',
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
	    //$pack->pack_picture = Input::file('pack_picture')->getFilename();

	    Auth::user()->packs()->save($pack);

		return Redirect::to('package_details/'/*.$pack->id*/)->withMessage('Paquete publicado.');
	}

	public function deletePack($id)
	{
		
	}

	public function updatePack($id)
	{
		
	}

	public function getPack($id)
	{
		
	}

}
?>