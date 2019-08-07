<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class IssuedBooks extends Model
{

    protected $fillable =[

        'student_Id',
        'teacher_Id',
        'Book_Id'
    ];


    //
}
