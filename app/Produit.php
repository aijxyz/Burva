<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Produit extends Model
{
    //
     use Notifiable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'libelleProd',
        'description',
        'seuilApprovis',
        'stockAlert',
        'ves',
        'reference',
        'prixHt',
        'fournisseur_id' ,
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





     public function entreStock()
    {
        return $this->hasMany('App\EntreStock');
        
    }

    public function fournisseur()
        {
        return $this->belongsTo('App\Fournisseur');
        
    }

}
 