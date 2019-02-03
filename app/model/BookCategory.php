<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $table='books_categories';
    protected $fillable=[
        'categories_id',
        'books_id'
    ];
}
