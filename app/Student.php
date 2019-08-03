<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable =[

        'studentName',
        'address',
        'gender',
        'studentImage',
        'fatherName',
        'phoneNumber',
        'facultyId' ,
        'courseId' ,
        'enrolledyear' ,
        'email'
    ];





    //
}
