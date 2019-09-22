<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'student_id', 'semester', 'initialDate', 'updateDate'
    ];

    public $timestamps = false;

    //
}
