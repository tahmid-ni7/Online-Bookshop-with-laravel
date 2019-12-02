<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
    public function image()
    {
        return $this->belongsTo('App\Image');
    }


    /*
     * Admin Authentication
     */
    public function isAdmin()
    {
        if($this->role->name == 'Admin'  && $this->is_active == 1)
        {
            return true;
        }
        return false;
    }

    /*
     * Users Authentication
     */
    public function isUser()
    {
        if ($this->role->name == 'User')
        {
            return true;
        }
        return false;
    }
}
