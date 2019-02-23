<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $table="fines";
    protected $fillable=[
        'fineAmount',
        'history_id'
    ];
}
