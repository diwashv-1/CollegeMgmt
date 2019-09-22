<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $fillable = [
        'student_id', 'isPresent', 'subject_id', 'remarks', 'date','month'
    ];

    public $timestamps = false;

    protected  $table = 'attendance';


    //
}
