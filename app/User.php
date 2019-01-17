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
        'name', 'email', 'role','status','password',
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
        if ($this->role == 1 && $this->status == 1) return true;
        return false;
    }
    public function isOperator()
    {
        if ($this->role == 2 && $this->status == 1) return true;
        return false;
    }
    public function isSuper()
    {
        if ($this->role == 3 && $this->status == 1) return true;
        return false;
    }
}
