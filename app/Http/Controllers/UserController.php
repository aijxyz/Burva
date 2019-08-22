<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades;
use Illuminate\Http\Request;
use DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;




class UserController extends Controller
{


 public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
        {   



        } 

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     * 
     */
  /*  protected function Store(Request  $request)
    {
       
        	$this->validate($request,[
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profil' => ['required', 'string', 'max:255'],
           
        ]);
    }
*/
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
   /* protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'profil' => $data['profil'],
          
        ]);
    }
*/


       public function Lister()
    {
      
    
        if(Auth::user()->paysAt == 'Internationnal')
        {
              $users = User::all(); 
            return view('vueUser',compact('users'));
        }

        else{
           $users= DB::table('users')
                         ->where('paysAt',Auth::user()->paysAt )
                         ->get();;

           return view('vueUser',compact('users'));

        }
      
        
    }

  public function update(Request $request)
    {   
            $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], 

         ]);


        if ($validator->fails()) {
            //return back()->withErrors($validator)->withInput();
             Alert::error('Echec Vos mot de passe ne correspondent pas ou sont inferieur a 8 caractère,', 'error');
             return back();
          
        }

         else{
               
               User::findOrfail($request->users_id)->update(['name' => $request->name, 'password' => Hash::make($request->password)]);
              Alert::success('Modifier', 'Avec success');     
              return back();

        }
  
      
        
        
    }


public function updateprofil(Request $request)
    {   
            $validator = Validator::make($request->all(), [
            'profil' => ['required', 'string', 'max:255'],            

         ]);


        if ($validator->fails()) {            //return back()->withErrors($validator)->withInput();
             Alert::error('Echec Vos mot de passe ne correspondent pas ou sont inferieur a 8 caractère,', 'error');
             return back();
          
        }

         else{
               
              User::findOrfail($request->users_id)->update($request->all());
              Alert::success('Modifier', 'Avec success');     
              return redirect()->route('userList'); 

        }
  
      
        
        
    }





        public function Supprimer(Request $request)
    {


 
        $users=DB::table('users')->where('id',$request->users_id)->delete();

        Alert::success('Supprimer', 'Avec success');
        return redirect()->route('userList'); 

        
    }





    /* Denco@ */
}




