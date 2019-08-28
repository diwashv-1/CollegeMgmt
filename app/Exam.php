<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{

    public $timestamps =false;

    protected $fillable = [

        'examName', 'subject_id', 'examDate', 'time','course_id', 'questionT','fm', 'pm'
    ];




}
