<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class BookISBN extends Model
{
    protected $table = 'book_i_s_b_ns';
    protected $fillable = [
        'book_id',
        'isbn'
    ];

    public function getBookName()
    {
        return $this->hasOne(
          'App\model\Book',
          'id',
          'book_id'
        );
    }
}
