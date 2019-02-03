<?php

namespace App\model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class student extends Authenticatable
{
    protected $table = 'students';
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
