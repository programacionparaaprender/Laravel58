<?php

namespace EditorialWeb;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    //const CREATED_AT = 'fecha_creacion';
    //const UPDATED_AT = 'fecha_actualizacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password','estado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //protected $dateFormat = 'Ymd H:i:s';
}
