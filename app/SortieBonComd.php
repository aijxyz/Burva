<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\EntreBonComd;

class SortieBonComd extends Model
{
    // 
    use Notifiable; 
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'debutSerie','finSerie','dateSortie','prix','centre','entreBonComd_id','prixTotal',
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




          public function entreBonComd()
    {
        return $this->belongsTo('App\EntreBonComd','entreBonComd_id');

    }


}
