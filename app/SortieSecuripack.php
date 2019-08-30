<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SortieSecuripack extends Model
{
    //


    use Notifiable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'debutSerie','finSerie','dateSortie','prixUnitaire','centre','reference','entreSecuripack_id','prixTotal','paysAt'
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




          public function entreSecuripack()
    {
        return $this->belongsTo('App\EntreSecuripack','entreSecuripack_id');

    }
}
