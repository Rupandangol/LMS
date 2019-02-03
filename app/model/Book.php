<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'title', 'detail', 'no_of_books'
    ];

    public function categories()
    {
        return $this->belongsToMany(
            'App\model\category',
            'books_categories',
            'books_id',
            'categories_id'
        );
    }

    public function authers(){
        return $this->belongsToMany(
            'App\model\auther',
            'books_authers',
            'book_id',
            'auther_id'
        );
    }

    public function students(){
        return $this->belongsToMany(
            'App\model\student',
            'books_students',
            'boks_id',
            'students_id'
        );
    }

}
