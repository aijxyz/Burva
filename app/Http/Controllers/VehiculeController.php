<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Vehicule;
use Auth;

class VehiculeController extends Controller
{
    //
	public function __construct()	{

		$this->middleware('auth');
	}

	public function show ()	{


		if (Auth::user()->paysAt == 'Internationnal') {

			$vehicules = Vehicule::all();    
			return view('vueVehicule' ,compact('vehicules'));   
		}

		else {

			$vehicules = Vehicule::all()->where('paysAt', Auth::user()->paysAt);    
			return view('vueVehicule' ,compact('vehicules'));   
		}
	}

	public function destroy (Request $request) {

		Vehicule::findOrfail($request->vehicules_id)->delete();   

		Alert::success('Supprimer', 'Avec success');
		return redirect()->route('vehiculeList');
	}

	public function store (Request $request) {

		$validator = Validator::make($request->all(), [
			'immatriculation' => ['required', 'string'],
			'marque' => ['required', 'string'],
			'type' => ['required', 'string'],
			'code'=> ['required', 'string'],
			'DPMC'=> ['required', 'Integer'],            
			'numChasis'=>['required', 'Integer'],
			'dateAquisition'=>['required', 'date']  

		]);

		if ($validator->fails () ) {
            //return back()->withErrors($validator)->withInput();
			Alert::toast('Erreur! Veuillez Verifier vos saisies', 'error');

			return redirect()->route('vehiculeList');

		}
		else{

			Vehicule::create($request->all());
			Alert::success('Ajouter', 'Avec success');     
			return redirect()->route('vehiculeList');
		}
	}

	public function update (Request $request){

		$validator = Validator::make($request->all(), [
			'immatriculation' => ['required', 'string'],
			'marque' => ['required', 'string'],
			'type' => ['required', 'string'],
			'code'=> ['required', 'string'],
			'DPMC'=> ['required', 'Integer'],            
			'numChasis'=>['required', 'Integer'],
			'dateAquisition'=>['required', 'date']  
		]);


		if ($validator->fails()) {

			Alert::toast('Erreur! Veuillez Verifier vos saisies', 'error');
			return redirect()->route('vehiculeList');
		}

		else{

			Vehicule::findOrfail($request->vehicules_id)->update($request->all());
			Alert::success('Modifier', 'Avec success');     
			return redirect()->route('vehiculeList');
		} 
	}
}
