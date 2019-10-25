<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Produit;
use App\Fournisseur;
use DB;
use Auth;

class ProduitController extends Controller
{
    //

   public function __construct()
   {
    $this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'libelleProd' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string'],
        'seuilApprovis' => ['required', 'Integer'],
        'stockAlert'=> ['required', 'Integer'],
        'ves'=> ['required', 'string'],            
        'reference'=>['required', 'Integer'],
        'prixHt'=>['required', 'Integer']  

    ]);

      if ($validator->fails()) {
            //return back()->withErrors($validator)->withInput();
       Alert::toast('Erreur! Veuillez Verifier vos siasies', 'error');

       return redirect()->route('produitList');

   }
   else{

      Produit::create($request->all());
      Alert::success('Ajouter', 'Avec success');     
      return redirect()->route('produitList');
  }



       /*return  $request->all();*/#

   }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {


      if (Auth::user()->paysAt == 'Internationnal') {
        $produits = Produit::all();    
          $som = DB::table('produits')->get()->sum('prixHt'); 
          $fourn= Fournisseur::all();         
    //  return view('homeAdmin',compact('users'));
          return view('vueProduit' ,compact('produits','fourn','som'));   
      }
      else{

        $produits = Produit::all()->where('paysAt',Auth::user()->paysAt);    
        $som = DB::table('produits')->where('paysAt',Auth::user()->paysAt )->get()->sum('prixHt'); 
        $fourn= Fournisseur::all()->where('paysAt',Auth::user()->paysAt);         
    //  return view('homeAdmin',compact('users'));
        return view('vueProduit' ,compact('produits','fourn','som'));   
    }


}


        //


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'libelleProd' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'seuilApprovis' => ['required', 'Integer'],
            'stockAlert'=> ['required', 'Integer'],
            'ves'=> ['required', 'string'],            
            'reference'=>['required', 'Integer'],
            'prixHt'=>['required', 'Integer']          

        ]);


        if ($validator->fails()) {
            //return back()->withErrors($validator)->withInput();
           Alert::toast('Erreur!  Veuillez Verifier vos siasies ', 'error');

           return redirect()->route('produitList');

       }

       else{
         Produit::findOrfail($request->produits_id)->update($request->all());
         Alert::success('Modifier', 'Avec success');     
         return redirect()->route('produitList');
     }




 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // $produits=DB::table('produits')->where('id',$request->fournisseurs_id)->delete();


        Produit::findOrfail($request->produits_id)->delete();   

        Alert::success('Supprimer', 'Avec success');
        return redirect()->route('produitList'); 

    }
}
