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
use App\SortieStock;
use DB;
use Response;
use Auth;
class SortieStockController extends Controller
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
        'dateSortie' => ['required', 'date'],
        'dateSaisie' => ['required', 'date'],        
        'QSortant' => ['required', 'Integer'],       
        'centre'=> ['required','string'], 
        'motif'=> ['required','string'],  
        'observ'=> ['required','string'],
                               
    ]);  

       if ($validator->fails()) {

         Alert::toast('Erreur!  Veuillez verifier vos champ ', 'error');
         return redirect()->route('sortieStockList');   


     }

     else{ 
                
               if ($request->QSortant < $request->enstock  ) {
          	    Produit::findOrfail($request->produit_id)->update(['stockAlert' => ( $request->enstock - $request->QSortant)]); 
          	   
                SortieStock::create($request->all());
             
        //s$this->guard()->login($user);
             Alert::success('Ajouter', 'Avec success');   
           return redirect()->route('sortieStockList');
           }

          else{

           Alert::toast('Erreur!  La sortie est superieur à la quantité en stock', 'error'); 
           return redirect()->route('sortieStockList');
           }
      
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

        if(Auth::user()->paysAt == 'Internationnal')
        {

         $sortieStocks = SortieStock::all(); 
          $prod= Produit::all();      


         //$sortieStocks = SortieStock::OrderByRaw('id DESC')->get(); 
        //	$sortieStocks = DB::select('select * from sortie_stocks order By id DESC ');

        /* $sortieStocks = DB::table('sortie_stocks')
                ->orderByRaw('updated_at - created_at DESC')
                ->get();*/

     // $enstok = EntreStock::get()->QEnStock;


         // $fourn= EntreStock::all();
     //$entreBord = Fournisseur::find(1)->fournisseur;
         
    //  return view('homeAdmin',compact('users'));
          return view('vueSortieStock' ,compact('sortieStocks','prod'));
      }

      else{


          $sortieStocks = SortieStock::all()->where('paysAt',Auth::user()->paysAt ); 

     // $enstok = EntreStock::get()->QEnStock;


          /*$fourn= DB::table('entre_stocks')
          ->where('paysAt',Auth::user()->paysAt )
          ->get();*/
     //$entreBord = Fournisseur::find(1)->fournisseur;
           
          $prod= DB::table('Produits')
          ->where('paysAt',Auth::user()->paysAt )
          ->get();     
        
    //  return view('homeAdmin',compact('users'));
          return view('vueSortieStock' ,compact('sortieStocks','prod'));

      }       
      
      
/*      $entreStocks = EntreStock::all(); 

     // $enstok = EntreStock::get()->QEnStock;

      
      $fourn= Fournisseur::all();
     //$entreBord = Fournisseur::find(1)->fournisseur;
      $prod= Produit::all();      

    //  return view('homeAdmin',compact('users'));
      return view('vueEntreStock' ,compact('entreStocks','prod','fourn'));*/
      

  }


/*
  public function comp(Request $request){

	//$term = Input::get('term');

    $query = $request->get('query');
    $results = DB::table('produits')
    ->join('fournisseurs', 'produits.fournisseur_id', '=', 'fournisseurs.id')
    ->select('fournisseurs.nom')
    ->where('produits.id',$query)
    ->get();

    return $results;	
}*/

public function compEnstocks(Request $request){

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
                'dateSortie' => ['required', 'date'],
			    'dateSaisie' => ['required', 'date'],        
			    'QSortant' => ['required', 'Integer'],       
			    'centre'=> ['required','string'], 
			    'motif'=> ['required','string'],  
			    'observ'=> ['required','string'],    
        ]);


        if ($validator->fails()) {
            //return back()->withErrors($validator)->withInput();
           Alert::toast('Erreur!  Veuillez verifier votre saisie', 'error');
           return redirect()->route('sortieStockList');          
       }

       else{
           
        $val1 = DB::table('sortie_stocks')->where('id',$request->sortieStock_id)->get('QSortant'); 
        $val2 = $val1 ->toArray();
        $vals = $val2[0]->QSortant;     

        $resul= $request->QSortant - $vals; 

        if ($resul < $request->enstock) {

			        Produit::findOrfail($request->produits_id)->update(['stockAlert' => ( $request->enstock - $resul)]); 
			        SortieStock::findOrfail($request->sortieStock_id)->update($request->all());                                
			        Alert::success('Modifier', 'Avec success');
			        return redirect()->route('sortieStockList');
			                                	
                                }  

        else{

              Alert::toast('Erreur!  La sortie est superieur à la quantité en stock', 'error'); 
             return redirect()->route('sortieStockList');  

        }                      

        
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
        
        $val1 = DB::table('sortie_stocks')->where('id',$request->sortieStock_id)->get('QSortant'); 
        $val2 = $val1 ->toArray();
        $vals = $val2[0]->QSortant; 

        $val3 = DB::table('produits')->where('id',$request->produits_id)->get('stockAlert'); 
        $val4 = $val3 ->toArray();               
        $valss = $val4[0]->stockAlert;                


        Produit::findOrfail($request->produits_id)->update(['stockAlert' => $valss + $vals]); 
        SortieStock::findOrfail($request->sortieStock_id)->delete(); 
        Alert::success('Supprimer', 'Avec success');
        return redirect()->route('sortieStockList'); 

    }





}
 