<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\EntreMaintenance;
use App\SortieMaintenance;
use DB;
use Auth;

class SortieMaintenanceController extends Controller
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
            return redirect()->route('SortieMaintenanceList');       


        }
        else{

          SortieMaintenance::create($request->all());
        //s$this->guard()->login($user);
          Alert::success('Ajouter', 'Avec success');   
          return redirect()->route('sortieMaintenanceList');
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


      if (Auth::user()->paysAt == 'Internationnal') {
          $sortieMaintenances = SortieMaintenance::all(); 
     //$entreBord = Fournisseur::find(1)->fournisseur;
          $entreMaint= EntreMaintenance::all();  
          $som = DB::table('sortie_maintenances')->get()->sum('prixTotal');
          return view('vueSortieMaintenance' ,compact('sortieMaintenances','entreMaint','som'));
      }else{
        $sortieMaintenances = SortieMaintenance::all()->where('paysAt',Auth::user()->paysAt); 
     //$entreBord = Fournisseur::find(1)->fournisseur;
        $entreMaint= EntreMaintenance::all()->where('paysAt',Auth::user()->paysAt );  
        $som = DB::table('sortie_maintenances')->where('paysAt',Auth::user()->paysAt )->get()->sum('prixTotal');
        return view('vueSortieMaintenance' ,compact('sortieMaintenances','entreMaint','som'));
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

           return redirect()->route('sortieMaintenanceList');

       }

       else{

          SortieMaintenance::findOrfail($request->sortieMaintenance_id)->update($request->all());
          Alert::success('Modifier', 'Avec success');     
          return redirect()->route('sortieMaintenanceList');

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
     SortieMaintenance::findOrfail($request->sortieMaintenance_id)->delete();  
     Alert::success('Supprimer', 'Avec success');
     return redirect()->route('sortieMaintenanceList'); 

 }



}
