<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Fournisseur;
use Auth;
use DB;





class FournisseurController extends Controller
{



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
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'societe' => ['required', 'string', 'max:255'],
            'civilite'=> ['required', 'string', 'max:255'],
            'adresse'=> ['required', 'string', 'max:255'],
            'pays'=>['required', 'string', 'max:255'],
            'telephone'=>['required', 'string', 'max:255'],
            'mobile'=>['required', 'string', 'max:255'],
            'fax'=>['required', 'string', 'max:255'],
            'email'=>['required', 'string', 'max:255', 'unique:fournisseurs'],
            'observation'=>['required', 'string', 'max:255'],
            'domaineComp'=>['required', 'string', 'max:255'],
            'delaiLivr'=>['required', 'string', 'max:255'],
            'condiPaye'=>['required', 'string', 'max:255'],
            'paysAt'=>['required', 'string', 'max:255'],

         ]);
 
        if ($validator->fails()) {
            //return back()->withErrors($validator)->withInput();
             Alert::toast('Erreur! Email existant Veuillez le changer ', 'error');

             return redirect()->route('fournisseurList');
          
        }
        else{

              Fournisseur::create($request->all());
              Alert::success('Ajouter', 'Avec success');     
             return redirect()->route('fournisseurList');
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
      
      
       // $fournisseurs = Fournisseur::all();        
       // return view('homeAdmin',compact('users'));


        if(Auth::user()->paysAt == 'Internationnal')
        {
          $fournisseurs = Fournisseur::all(); 
          return view('vueFournisseur' ,compact('fournisseurs'));
        }

        else{
          $fournisseurs = DB::table('fournisseurs')
                         ->where('paysAt',Auth::user()->paysAt )
                         ->get();;

         return view('vueFournisseur' ,compact('fournisseurs'));

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
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'societe' => ['required', 'string', 'max:255'],
            'civilite'=> ['required', 'string', 'max:255'],
            'adresse'=> ['required', 'string', 'max:255'],
            'pays'=>['required', 'string', 'max:255'],
            'telephone'=>['required', 'string', 'max:255'],
            'mobile'=>['required', 'string', 'max:255'],
            'fax'=>['required', 'string', 'max:255'],
            'email'=>['required', 'string', 'max:255'],
            'observation'=>['required', 'string', 'max:255'],
            'domaineComp'=>['required', 'string', 'max:255'],
            'delaiLivr'=>['required', 'string', 'max:255'],
            'condiPaye'=>['required', 'string', 'max:255'],

         ]);


        if ($validator->fails()) {
            //return back()->withErrors($validator)->withInput();
             Alert::toast('Erreur! Email existant Veuillez le changer ', 'error');

             return redirect()->route('fournisseurList');
          
        }

         else{
               $fournisseurs=Fournisseur::findOrfail($request->fournisseurs_id)->update($request->all());
              Alert::success('Modifier', 'Avec success');     
              return redirect()->route('fournisseurList');
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


        $fournisseurs=Fournisseur::findOrfail($request->fournisseurs_id)->delete();   
             
        Alert::success('Supprimer', 'Avec success');
        return redirect()->route('fournisseurList'); 

    }




}
