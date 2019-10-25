<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Messages;
use App\Client;
use DB;
use Auth;
use DateTime ;
class MessagesController extends Controller
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
       
         
                   
             Messages::create([
            'message' =>('Monsieur '.Auth::user()->name.' desire modifier le client '.$request->nomClient),
            'autorisation' =>(0),
            'profil' => (Auth::user()->profil),
            'date_envoie' => (new DateTime()),
            'client_id' => ($request->client_id),
            'user_id' => (Auth::user()->id),
            'paysAt' => (Auth::user()->paysAt)
                            ]);

            Alert::success('Envoyé', 'Avec success'); 
            return redirect()->route('clientList');     

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
      $messages = Messages::all(); 
    //  $som = DB::table('cleints')->get()->sum('prixTotal');
     //$entreBord = Fournisseur::find(1)->fournisseur;
     // $fourn= Fournisseur::all();      
    
    //  return view('homeAdmin',compact('users'));

      return view('vueMessage' ,compact('messages'));     
        
      }


    elseif (Auth::user()->profil == 'Directeur général') {

            
           	
          $messages = Messages::all()->where('paysAt', Auth::user()->paysAt)
                                     ->where('profil', '=' , 'Directeur commercial');
                                      

           return view('vueMessage' ,compact('messages'));

           }

   elseif (Auth::user()->profil == 'Directeur commercial') {

   
          $messages = Messages::all()->where('paysAt', Auth::user()->paysAt)
                                     ->where('profil', '=' ,'Commercial');
                                                            
                             
           return view('vueMessage' ,compact('messages'));

           }

 

         




           /** $som = DB::table('clients')
                   ->where('paysAt',Auth::user()->paysAt )
                   ->get()->sum('prixTotal');**/

            /** $fourn= DB::table('fournisseurs')
                         ->where('paysAt',Auth::user()->paysAt )
                         ->get();**/

          

        } 
    

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
             //Client::findOrfail($request->client_id)->get('niveauAuto');

           // $test = Client::get('niveauAuto')->where('id', $request->client_id);
        $test =  DB::table('clients')    
		       ->select('niveauAuto')
		       ->where('id',$request->client_id)
		       ->get();
		       $val = $test ->toArray();
               $vals = $val[0]->niveauAuto;                                            
            

    	    if ($vals == 2){

              Alert::error('Vous ne pouvez pas autoriser la modification ', 'Echec');     
              return redirect()->route('messageList');
    	    }

            elseif (Auth::user()->profil == "Directeur commercial") {

              Client::findOrfail($request->client_id)->update(['niveauAuto' => (0)]);             
              Alert::success('Autorisé', 'Avec success');     
              return redirect()->route('messageList');
            }
            elseif (Auth::user()->profil == 'Directeur général') {

              Client::findOrfail($request->client_id)->update(['niveauAuto' => (1)]);            
              Alert::success('Autorisé', 'Avec success');     
              return redirect()->route('messageList');

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
       Messages::findOrfail($request->message_id)->delete();  
       Alert::success('Supprimer', 'Avec success');
        return redirect()->route('messageList'); 

    }







}
