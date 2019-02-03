<?php

namespace App\model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    protected $fillable = [
        'username',
        'email',
        'password',
        'address',
        'photo',
        'status',
        'phone',
        'remember_me'
    ];

    protected $hidden = ['password'];
}
