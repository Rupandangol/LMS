<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable =
        [
            'noOfIssue',
            'fineAmount',
            'returnTime'
//            'fineMultiplier',
//            'fineMultiplierDate'
        ];
}
