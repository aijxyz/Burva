<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\EntreStock;
use App\Produit;
use App\Fournisseur;
use DB;
use Response;

class EntreStockController extends Controller
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
       
         $validator = Validator::make($request->all(),[
            'dateAppro' => ['required', 'date'],
            'QEntrant' => ['required', 'Integer'],
            'prixAchat' => ['required', 'Integer'],
            'observ'=> ['required','string'],  
            'numFacture'=> ['required','string'],                    
              ]);  

         if ($validator->fails()) {

           Alert::toast('Erreur!  Veuillez verifier le champ de saisie prix total', 'error');
          return redirect()->route('entreStockList');   


            }

        else{ 

        
        Produit::findOrfail($request->produit_id)->update(['stockAlert' => ($request->QEntrant + $request->enstock)]); 
        EntreStock::create($request->all());
        //s$this->guard()->login($user);
        Alert::success('Ajouter', 'Avec success');   
        return redirect()->route('entreStockList');
        }


    }

            /*  EntreStock::create($request->all());
              Alert::success('Ajouter', 'Avec success');     
             return redirect()->route('entreStockList');*/
           
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      
      
      $entreStocks = EntreStock::all(); 

     // $enstok = EntreStock::get()->QEnStock;

      
      $fourn= Fournisseur::all();
     //$entreBord = Fournisseur::find(1)->fournisseur;
      $prod= Produit::all();      

    //  return view('homeAdmin',compact('users'));
      return view('vueEntreStock' ,compact('entreStocks','prod','fourn'));
      
        
    }



public function comp(Request $request){

	//$term = Input::get('term');
 	
        $query = $request->get('query');
		$results = DB::table('produits')
            ->join('fournisseurs', 'produits.fournisseur_id', '=', 'fournisseurs.id')
            ->select('fournisseurs.nom')
            ->where('produits.id',$query)
            ->get();
	
	return $results;	
}

public function compEnstock(Request $request){

	//$term = Input::get('term');
 	
        $query = $request->get('query');
		$results = DB::table('produits')->select('produits.stockAlert')
            ->where('produits.id',$query)
            ->get();	
	    return $results; 	
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
            'dateAppro' => ['required', 'date'],
            'QEntrant' => ['required', 'Integer'],
            'prixAchat' => ['required', 'Integer'],
            'observ'=> ['required','string'],  
            'numFacture'=> ['required','string'],          
         ]);


        if ($validator->fails()) {
            //return back()->withErrors($validator)->withInput();
             Alert::toast('Erreur!  Veuillez verifier votre saisie', 'error');
             return redirect()->route('entreStockList');          
        }

         else{

                $val1 = DB::table('entre_stocks')->where('id',$request->entreStock_id)->get('QEntrant'); 
                $val2 = $val1 ->toArray();
                $vals = $val2[0]->QEntrant;                                   
               
               Produit::findOrfail($request->produits_id)->update(['stockAlert' => (($request->QEntrant - $vals) + $request->enstock)]); 
               EntreStock::findOrfail($request->entreStock_id)->update($request->all());                                
               Alert::success('Modifier', 'Avec success');
               return redirect()->route('entreStockList');
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
        // $fournisseurs=DB::table('fournisseurs')->where('id',$request->fournisseurs_id)->delete();
        $val1 = DB::table('entre_stocks')->where('id',$request->entreStock_id)->get('QEntrant'); 
                $val2 = $val1 ->toArray();
                $vals = $val2[0]->QEntrant; 

        $val3 = DB::table('produits')->where('id',$request->produits_id)->get('stockAlert'); 
                $val4 = $val3 ->toArray();               
                 $valss = $val4[0]->stockAlert;                             


        Produit::findOrfail($request->produits_id)->update(['stockAlert' => $valss - $vals]); 
        EntreStock::findOrfail($request->entreStock_id)->delete(); 
        Alert::success('Supprimer', 'Avec success');
        return redirect()->route('entreStockList'); 

    }

}
