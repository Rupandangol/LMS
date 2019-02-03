<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    protected $table='histories';
    protected $fillable=[
      'studentName',
      'bookTitle',
      'createdAt',
      'date'
    ];
}
