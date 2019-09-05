<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{

    protected $fillable = [
       'student_id', 'exam_id', 'totalQsn', 'nonAttemptQsn', 'correct', 'wrong',
    ];

    //
}
