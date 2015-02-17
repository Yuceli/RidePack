<?php

class SuppliersController extends \BaseController{

	public function getSuppliers(){
		$suppliers= Supplier::all();

	return View::make('users/index')->with('suppliers', $suppliers);

	}

	//Funciones para el crud de proveedores
	public function create(){
		$supplier = new Supplier;
		$supplier -> suppliername ="proveedor 2";
		$supplier -> store = "la tienda";
		$supplier -> save();
		$supp = Supplier::all();
		return $supp;
	}

	public function read($name){
		
		$supplier = Supplier::whereSuppliername($name)->first();

		return var_dump($supplier-> suppliername);
	}
	
	
	public function update($id){
		$supplier = Supplier::find($id);
		$supplier-> suppliername = "Proveedor modificado";
		$supplier ->save();

		return $supplier;
	}


	public function delete($id){
		$supplier = Supplier::find($id);
		$supplier ->delete();
		$supp = Supplier::all();
		return $supp;
	}
}