<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publicidad extends Model
{
    //
	use SoftDeletes;
	protected $table ='publicidads';
	public function espacios()
	{
		return $this->belongsToMany('App\Espacio');
	}
	public function user(){
		return $this->belongsTo('App\User');
	}
}
