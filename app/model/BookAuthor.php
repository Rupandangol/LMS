<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    protected $table='books_authers';

    protected $fillable=[
        'book_id',
        'auther_id'
    ];
}
