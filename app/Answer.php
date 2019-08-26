<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $fillable = [

        'question_id', 'option1','option2','option3','option4', 'correct',

    ];

    public $timestamps = false;

    //
}
