<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Fournisseur;
use App\SortieTicket;

class EntreTicket extends Model
{
    //
    use Notifiable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'debutSerie','finSerie','dateEntre','prixUnitaire','prixTotal','fournisseur_id','paysAt'
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

    

   
     public function sortieTicket()
    {
        return $this->hasMany('App\SortieTicket');
        
    }




       public function fournisseur()
    {
        return $this->belongsTo('App\Fournisseur');
    }
}
 