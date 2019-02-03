<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class auther extends Model
{
    protected $table = 'authers';
    protected $fillable = [
        'name','status'
    ];

}
