<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Authenticatable;
use Illuminate\Support\Facades;
use Auth;



class HomeController extends Controller
{

        

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
        {   

    /*** Verification des profil et 
    **redirection des utilisateur
    ** par l'indentifiant du user authentifié
    **/
     
      $Profil= Auth::user()->profil;
    
    if ($Profil =='Administration') {
          return view('homeAdmin'); 
      }
     else{

       
       return view('home');
      }        

      /*Denco@*/
    }
}
