<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Espacio extends Model
{
    //
	protected $table ='espacios';
	use SoftDeletes;
	public function maquina()
	{
		return $this->belongsTo('App\Maquina');
	}
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function publicidads()
	{
		return $this->belongsToMany('App\Publicidad');
	}

}
