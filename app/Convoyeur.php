<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Convoyeur extends Model
{
    
    protected $fillable = [
    	'id',
    	'matricule',
    	'nom',
    	'prenom',
    	'date_naissance',
    	'fonction',
    	'date_embauche',
        'paysAt'
    ];

    protected $hidden = [
    	'id','remember_token',
    ];

    protected $casts = [
    	'name_at' => 'datetime',
    ];

}
