<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
	protected $table ='users';
	use SoftDeletes;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function isAdmin()
	{
		return $this->type<2;
	}
	public function isSuperAdmin()
	{
		return $this->type==0;
	}


	public function maquinas()
	{
		return $this->belongsToMany('App\Maquina');
	}

	public function espacios()
	{
		return $this->hasMany('App\Espacio');
	}

	public function users()
	{
		return $this->hasMany('App\User','admin_by');
	}

	public function admin(){
		return $this->belongsTo('App\User','admin_by','id');
	}
	public function publicidads(){
		return $this->hasMany('App\Publicidad');
	}

}
