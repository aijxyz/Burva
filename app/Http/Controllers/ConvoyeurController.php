<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Convoyeur;
use Auth;

class ConvoyeurController extends Controller
{

    //
	public function __construct()	{

		$this->middleware('auth');
	}

	public function show ()	{


		if (Auth::user()->paysAt == 'Internationnal') {

			$convoyeurs = Convoyeur::all();    
			return view('vueConvoyeur' ,compact('convoyeurs'));   
		}

		else {

			$convoyeurs = Convoyeur::all()->where('paysAt', Auth::user()->paysAt);    
			return view('vueConvoyeur' ,compact('convoyeurs'));   
		}
	}

	public function destroy (Request $request) {

		Convoyeur::findOrfail($request->convoyeur_id)->delete();   
		Alert::success('Supprimer', 'Avec success');
		return redirect()->route('convoyeurList');
	}

	public function store (Request $request) {

		$validator = Validator::make($request->all(), [
			'matricule' => ['required', 'string'],
			'nom' => ['required', 'string'],
			'prenom' => ['required', 'string'],
			'date_naissance'=> ['required', 'date'],
			'fonction'=> ['required', 'string'],            
			'date_embauche'=>['required', 'date']

		]);

		if ($validator->fails()) {
            //return back()->withErrors($validator)->withInput();
			Alert::toast('Erreur! Veuillez Verifier vos saisies', 'error');

			return redirect()->route('convoyeurList');

		}
		else{

			Convoyeur::create($request->all());
			Alert::success('Ajouter', 'Avec success');     
			return redirect()->route('convoyeurList');
		}
	}

	public function update (Request $request) {

		$validator = Validator::make($request->all(), [
			'matricule' => ['required', 'string'],
			'nom' => ['required', 'string'],
			'prenom' => ['required', 'string'],
			'date_naissance'=> ['required', 'date'],
			'fonction'=> ['required', 'string'],            
			'date_embauche'=>['required', 'date'] 
		]);


		if ($validator->fails () ) {

			Alert::toast('Erreur! Veuillez Verifier vos saisies', 'error');
			return redirect()->route('convoyeurList');
		}

		else{

			Convoyeur::findOrfail($request->convoyeur_id)->update($request->all());
			Alert::success('Modifier', 'Avec success');     
			return redirect()->route('convoyeurList');
		} 
	}
}
