<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Site;
/*use App\Client;*/

class Site extends Model
{
    	use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id',
    	'site',
    	'situation',
    	'nom_contact',
    	'tel',
    	'client_id',
    	'km_bitume',
    	'num_carte' ,
    	'tarif_ht' ,
    	'tarif_km_bitume' ,
    	'tarif_km_piste' ,
    	'centre' ,
    	'objet' ,
    	'forfait_mensuel' ,
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

/*    public function client () {
        return $this->belongsTo('App\Client');
    }*/
}
