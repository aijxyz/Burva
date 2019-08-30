<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\EntreSecuripack;
use App\Fournisseur;
use DB;
use Auth;



class EntreSecuripackController extends Controller
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




     public function store(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'debutSerie' => ['required', 'Integer'],
            'finSerie' => ['required', 'Integer'],
            'dateEntre' => ['required', 'date'],
            'prixUnitaire'=> ['required', 'Integer'],    
            'reference'=> ['required', 'Integer'],  
            'prixTotal' =>['required', 'Integer'],           
         ]);

            if ($validator->fails()) {

        Alert::toast('Erreur!  Veuillez verifier le champ de saisie prix total', 'error');
          return redirect()->route('entreSecuripackList');       


            }
              else{

         EntreSecuripack::create($request->all());
        //s$this->guard()->login($user);
         Alert::success('Ajouter', 'Avec success');   
        return redirect()->route('entreSecuripackList');
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
      $entreSecuripacks = EntreSecuripack::all(); 
      $som = DB::table('entre_securipacks')->get()->sum('prixTotal');
     //$entreBord = Fournisseur::find(1)->fournisseur;
      $fourn= Fournisseur::all();    
  
       

    //  return view('homeAdmin',compact('users'));
         return view('vueEntreSecuripack' ,compact('entreSecuripacks','fourn','som'));
        }

        else{

          $entreSecuripacks = EntreSecuripack::all()->where('paysAt',Auth::user()->paysAt );                        
                             

            $som = DB::table('entre_securipacks')
                   ->where('paysAt',Auth::user()->paysAt )
                   ->get()->sum('prixTotal');

             $fourn= DB::table('fournisseurs')
                         ->where('paysAt',Auth::user()->paysAt )
                         ->get();

          return view('vueEntreSecuripack' ,compact('entreSecuripacks','fourn','som'));

        } 

      
        
    }
   
               
        //
    

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
            'dateEntre' => ['required', 'date'],
            'prixUnitaire'=> ['required', 'Integer'],    
            'reference'=> ['required', 'Integer'],  
             'prixTotal' =>['required', 'Integer'],           
                
         ]);


        if ($validator->fails()) {
            //return back()->withErrors($validator)->withInput();
            Alert::toast('Erreur!  Veuillez verifier le champ de saisie prix total', 'error');
             return redirect()->route('entreSecuripackList');
          
        }

         else{

             $entreSecuripacks = EntreSecuripack::findOrfail($request->entreSecuripack_id)->update($request->all());
              Alert::success('Modifier', 'Avec success');     
              return redirect()->route('entreSecuripackList');

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
       $entreSecuripacks=EntreSecuripack::findOrfail($request->entreSecuripack_id)->delete();  
       Alert::success('Supprimer', 'Avec success');
        return redirect()->route('entreSecuripackList'); 

    }


}
