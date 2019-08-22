<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EntreStock extends Model
{
    //
     use Notifiable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'id','dateAppro','QEntrant','prixAchat','observ','numFacture','produit_id',
    ];


   


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 
         'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * 
     * @var array
     */
    protected $casts = [
        'name_at' => 'datetime',
    ];

    

   
     public function sortieStock()
    {
        return $this->hasMany('App\SortieStock');
        
    }




       public function produit()
    {

        return $this->belongsTo('App\Produit');
    }
  


}
 