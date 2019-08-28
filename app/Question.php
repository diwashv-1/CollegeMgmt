<?php

namespace College;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    //

    protected $fillable = [
        'question', 'course_id','set', 'staff_id', 'subject_id', 'approved'
    ];



public function staffs(){


    return $this->belongsToMany(staffs::class, 'subject_staffs');
}



public function answer(){


    return $this->hasOne(Answer::class, );


}



}
