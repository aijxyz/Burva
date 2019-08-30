<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request; 
use App\EntreTicket;
use App\Fournisseur;
use DB; 
use Auth;

class EntreTicketController extends Controller
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
            'debutSerie' => ['required', 'Integer'],
            'finSerie' => ['required', 'Integer'],
            'dateEntre' => ['required', 'date'],
            'prixUnitaire'=> ['required','Integer'],
            'prixTotal' =>['required', 'Integer'],
              ]);  

         if ($validator->fails()) {

           Alert::toast('Erreur!  Veuillez verifier le champ de saisie prix total', 'error');
           return redirect()->route('entreTicketList');   


            }

        else{ 

        EntreTicket::create($request->all());
        //s$this->guard()->login($user);
        Alert::success('Ajouter', 'Avec success');   
        return redirect()->route('entreTicketList');
        }


    }

            /*  EntreTicket::create($request->all());
              Alert::success('Ajouter', 'Avec success');     
             return redirect()->route('entreTicketList');*/
           
    

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
      $entreTickets = EntreTicket::all(); 
      $som = DB::table('entre_tickets')->get()->sum('prixTotal');
     //$entreBord = Fournisseur::find(1)->fournisseur;
      $fourn= Fournisseur::all();      
    
    //  return view('homeAdmin',compact('users'));
      return view('vueEntreTicket' ,compact('entreTickets','fourn','som'));
      }

    else{

           $entreTickets = EntreTicket::all()->where('paysAt',Auth::user()->paysAt );                        
                             

            $som = DB::table('entre_tickets')
                   ->where('paysAt',Auth::user()->paysAt )
                   ->get()->sum('prixTotal');

             $fourn= DB::table('fournisseurs')
                         ->where('paysAt',Auth::user()->paysAt )
                         ->get();

          return view('vueEntreTicket' ,compact('entreTickets','fourn','som'));

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
            'dateEntre' => ['required', 'date'],
            'prixUnitaire'=> ['required', 'Integer', ],  
            'fournisseur_id'=> ['required', 'Integer'], 
            'prixTotal' =>['required', 'Integer'],        
         ]);


        if ($validator->fails()) {
            //return back()->withErrors($validator)->withInput();
            Alert::toast('Erreur!  Veuillez verifier le champ de saisie prix total', 'error');

             return redirect()->route('entreTicketList');
          
        }

         else{

              $entreTickets = EntreTicket::findOrfail($request->entreTicket_id)->update($request->all());
              Alert::success('Modifier', 'Avec success');     
              return redirect()->route('entreTicketList');

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
       $entreTickets=EntreTicket::findOrfail($request->entreTicket_id)->delete();  
       Alert::success('Supprimer', 'Avec success');
        return redirect()->route('entreTicketList'); 

    }


}
 