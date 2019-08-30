<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\EntreBordereau;
use App\SortieBordereau;
use DB;
use Auth;


class SortieBordereauController extends Controller
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
            'debutSerie' => ['required', 'Integer'],
            'finSerie' => ['required', 'Integer'],
            'dateSortie' => ['required', 'date'],
            'centre'=> ['required', 'string', 'max:255'], 
            'prix'=> ['required', 'Integer'],
            'prixTotal' =>['required', 'Integer'],           
         ]);

            if ($validator->fails()) {

        Alert::toast('Erreur!  Veuillez verifier le champ de saisie prix total', 'error');
          return redirect()->route('sortieBordereauList');       


            }
              else{

          SortieBordereau::create($request->all());
        //s$this->guard()->login($user);
         Alert::success('Ajouter', 'Avec success');   
        return redirect()->route('sortieBordereauList');
    }
    
    }
       
    
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
          $sortieBordereaus = SortieBordereau::all(); 
          $som = DB::table('sortie_bordereaus')->get()->sum('prixTotal');
          $entreBord= EntreBordereau::all();  
        return view('vueSortieBordereau' ,compact('sortieBordereaus','entreBord','som'));
        }

        else{

          $sortieBordereaus = SortieBordereau::all()->where('paysAt',Auth::user()->paysAt );                        
                             

            $som = DB::table('sortie_bordereaus')
                   ->where('paysAt',Auth::user()->paysAt )
                   ->get()->sum('prixTotal');

             $entreBord= DB::table('entre_bordereaus')
                         ->where('paysAt',Auth::user()->paysAt )
                         ->get();

          return view('vueSortieBordereau' ,compact('sortieBordereaus','entreBord','som'));

        }

      
        
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
            'debutSerie' => ['required', 'Integer'],
            'finSerie' => ['required', 'Integer'],
            'dateSortie' => ['required', 'date'],
            'centre'=> ['required', 'string', 'max:255'], 
            'prix'=> ['required', 'Integer'],
            'prixTotal' =>['required', 'Integer'],           
         ]);


        if ($validator->fails()) {
            //return back()->withErrors($validator)->withInput();
             Alert::toast('Erreur!  Veuillez verifier le champ de saisie prix total', 'error');

             return redirect()->route('sortieBordereauList');
          
        }

         else{

             $sortieBordereaus = SortieBordereau::findOrfail($request->sortieBordereau_id)->update($request->all());
              Alert::success('Modifier', 'Avec success');     
              return redirect()->route('sortieBordereauList');

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
       $sortieBordereaus=SortieBordereau::findOrfail($request->sortieBordereau_id)->delete();  
       Alert::success('Supprimer', 'Avec success');
        return redirect()->route('sortieBordereauList'); 

    }




}
