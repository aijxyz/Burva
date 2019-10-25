<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Site;
// use App\Client;
use Auth;

class SiteController extends Controller
{

    //
	public function __construct()	{

		$this->middleware('auth');
	}

	public function show ()	{


		if (Auth::user()->paysAt == 'Internationnal') {

			$sites = Site::all();    
			return view('vueSite' ,compact('sites'));   
		}

		else {

			$sites = Site::all()->where('paysAt', Auth::user()->paysAt);    
			return view('vueSite' ,compact('sites'));   
		}
	}

	public function destroy (Request $request) {

		Site::findOrfail($request->sites_id)->delete();   

		Alert::success('Supprimer', 'Avec success');
		return redirect()->route('siteList');
	}

	public function store (Request $request) {

		$validator = Validator::make($request->all(), [
			'site' => ['required', 'string'],
			'situation' => ['required', 'string'],
			'nom_contact' => ['required', 'string'],
			'tel' => ['required', 'integer'],
			'km_bitume' => ['required', 'integer'],
			'num_carte' => ['required', 'integer'],
			'tarif_ht' => ['required', 'integer'],
			'tarif_km_bitume' => ['required', 'integer'],
			'tarif_km_piste'=> ['required', 'integer'],
			'centre'=> ['required', 'string'],            
			'objet'=>['required', 'string'],
			'forfait_mensuel'=>['required', 'integer'],
			'client_id'=>['required', 'integer']
		]);

		if ($validator->fails () ) {
            //return back()->withErrors($validator)->withInput();
			Alert::toast('Erreur! Veuillez Verifier vos saisies', 'error');

			return redirect()->route('siteList');

		}
		else{

			Site::create($request->all());
			Alert::success('Ajouter', 'Avec success');     
			return redirect()->route('siteList');
		}
	}

	public function update (Request $request){

		$validator = Validator::make($request->all(), [
			'site' => ['required', 'string'],
			'situation' => ['required', 'string'],
			'nom_contact' => ['required', 'string'],
			'tel' => ['required', 'integer'],
			'km_bitume' => ['required', 'integer'],
			'num_carte' => ['required', 'integer'],
			'tarif_ht' => ['required', 'integer'],
			'tarif_km_bitume' => ['required', 'integer'],
			'tarif_km_piste'=> ['required', 'integer'],
			'centre'=> ['required', 'string'],            
			'objet'=>['required', 'string'],
			'forfait_mensuel'=>['required', 'integer'],
			'client_id'=>['required', 'integer']
		]);


		if ($validator->fails()) {

			Alert::toast('Erreur! Veuillez Verifier vos saisies', 'error');
			return redirect()->route('siteList');
		}

		else{

			Site::findOrfail($request->site_id)->update($request->all());
			Alert::success('Modifier', 'Avec success');     
			return redirect()->route('siteList');
		} 
	}
}
