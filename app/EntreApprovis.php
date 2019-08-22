<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Fournisseur;
use App\SortieApprovis;

class EntreApprovis extends Model
{
    //

    use Notifiable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'debutSerie','finSerie','dateEntre','prixUnitaire','prixTotal','fournisseur_id',
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

    

   
     public function sortieApprovis()
    {
        return $this->hasMany('App\SortieApprovis');
        
    }




       public function fournisseur()
    {
        return $this->belongsTo('App\Fournisseur');
    }
  
}
 