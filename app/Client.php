<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Model
{
    //

    use Notifiable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nomClient', 'situationGeo', 'telephone','regimeImpot','boitePost', 'ville', 'rc','ncc','fonct', 'nomContact', 'telPortable','email','secteurAct', 'numContrat','dateEffet','duree','forfaitMens','tdfvb','tdfI', 'madcaisse', 'collecte','gardFond','comptageTri', 'gestionAtm', 'BanqueCentr','agencePrincip','agenceSecond', 'cashPoint', 'permanent','appel','intraMuros', 'extraMuros', 'puSecuri','puScelle','paysAt','porteF','niveauAuto'
            
    

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 
        'password', 'remember_token',
    ];
 
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name_at' => 'datetime',
    ];
}
