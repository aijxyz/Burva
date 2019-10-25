<?php

namespace App\Http\Controllers; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Client;
use DB;
use Auth;

class ClientController extends Controller
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

           'email'=>['required', 'string', 'max:255', 'unique:clients'],
              ]);  

         if ($validator->fails()) {

           Alert::toast('Erreur! Email existant Veuillez le changer ', 'error');
          return redirect()->route('clientList');   


            }

        else{ 

        Client::create($request->all());
        //s$this->guard()->login($user);
        Alert::success('Ajouter', 'Avec success');   
        return redirect()->route('clientList');
        }


    }

            /*  EntreBordereau::create($request->all());
              Alert::success('Ajouter', 'Avec success');     
             return redirect()->route('entreBordereauList');*/
           
    

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
      $clients = Client::all(); 
    //  $som = DB::table('cleints')->get()->sum('prixTotal');
     //$entreBord = Fournisseur::find(1)->fournisseur;
     // $fourn= Fournisseur::all();      
    
    //  return view('homeAdmin',compact('users'));
      return view('vueClient' ,compact('clients'));     
        
      }

   else{

          $clients =Client::all()->where('paysAt',Auth::user()->paysAt );                        
                             

           /** $som = DB::table('clients')
                   ->where('paysAt',Auth::user()->paysAt )
                   ->get()->sum('prixTotal');**/

            /** $fourn= DB::table('fournisseurs')
                         ->where('paysAt',Auth::user()->paysAt )
                         ->get();**/

          return view('vueClient' ,compact('clients'));

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
           
           'email'=>['required', 'string', 'max:255'],      
         ]);


        if ($validator->fails()) {
            //return back()->withErrors($validator)->withInput();
          Alert::toast('Erreur! Email existant Veuillez le changer ', 'error');
          return redirect()->route('clientList');   
          
        }

         else{

              Client::findOrfail($request->client_id)->update($request->all());
              // Client::findOrfail($request->client_id)->update(['niveauAuto' => (1)]); 
              Alert::success('Modifier', 'Avec success');     
              return redirect()->route('clientList');

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
       Client::findOrfail($request->client_id)->delete();  
       Alert::success('Supprimer', 'Avec success');
        return redirect()->route('clientList'); 

    }



}
