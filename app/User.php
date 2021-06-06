<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    const ACTIVE = 1, In_ACTIVE = 2;
    const YES = 1, NO = 2;

    protected $fillable = [
        'name', 'email', 'password', 'contact', 'status', 'last_logged_in_ip', 'email_verification', 'is_admin','deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
