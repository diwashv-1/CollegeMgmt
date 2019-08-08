<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class NoBookBlacklist extends Model
{
    protected  $fillable = [

        'student_id',
        'teacher_id',
        'countBook'

    ];


    //
}
