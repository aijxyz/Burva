<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use RealRashid\SweetAlert\Facades\Alert;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   /* protected $redirectTo = '/home';*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');  
        /* auth au lieu de guest*/

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

         Alert::error('Ajout Echoue  Veuillez verifier votre saisie', 'error');
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profil' => ['required', 'string', 'max:255'],
            'paysAt' => ['required', 'string', 'max:255'],

           /*ajout de profil ici*/
        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *s
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Alert::success('Ajouter', 'Avec success');
        return User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'profil' => $data['profil'],
            'paysAt' => $data['paysAt'],
          
        ]);


    }
    /* Denco@ */
}
