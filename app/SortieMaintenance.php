<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\EntreMaintenance;
class SortieMaintenance extends Model
{
    //

    use Notifiable;
    
    /** 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'debutSerie','finSerie','dateSortie','prix','centre','entreMaintenance_id','prixTotal',
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




          public function entreMaintenance()
    {
        return $this->belongsTo('App\EntreMaintenance','entreMaintenance_id');

    }


}
