<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    protected $table = 'issue_books';
    protected $fillable = [
        'date', 'status', 'book_id', 'student_id'
    ];

    public function getBook()
    {
        return $this->hasOne(
            'App\model\Book',
            'id',
            'book_id');
    }

    public function getStudent(){
        return $this->hasOne(
            'App\model\student',
            'id',
            'student_id'
        );
    }


}
