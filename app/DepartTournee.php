<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartTournee extends Model
{
	protected $fillable = [
		'id',
		'tournee',
		'date_tournee',
		'vehicule',
		'chauffeur',
		'agent_garde',
		'chef_bord',
		'cout_tournee',
		'site'
	];

	protected $hidden = [
		'id','remember_token',
	];

	protected $casts = [
		'name_at' => 'datetime',
	];
}
