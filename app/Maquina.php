<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maquina extends Model
{

	use SoftDeletes;
	protected $table ='maquinas';
    //

	public function users()
	{
		return $this->belongsToMany('App\User');
	}

	public function espacios(){
		return $this->hasMany('App\Espacio');
	}


}
