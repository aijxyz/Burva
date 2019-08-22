<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
     use Notifiable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'societe',
        'civilite',
        'adresse',
        'pays',
        'telephone',
        'mobile',
        'fax',
        'email',
        'observation',
        'domaineComp',
        'delaiLivr',
        'condiPaye',
        'paysAt'
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id','remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name_at' => 'datetime',
    ];






    public function entreBordereau()
    {
        return $this->hasMany('App\EntreBordereau');
        
    } 


    public function entreSecuripack()
    {
        return $this->hasMany('App\EntreSecuripack');
        
    }

      public function entreApprovis()
    {
        return $this->hasMany('App\EntreApprovis');
        
    }

          public function entreBonComd()
    {
        return $this->hasMany('App\EntreBonComd');
        
    }
      public function entreMaintenance()
    {
        return $this->hasMany('App\EntreMaintenance');
        
    }
         public function entreTicket()
    {
        return $this->hasMany('App\EntreTicket');
        
    }





}
