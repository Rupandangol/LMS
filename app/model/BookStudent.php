<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BookStudent extends Model
{
    protected $table = 'books_students';
    protected $fillable = [
        'boks_id', 'students_id'
    ];
}
