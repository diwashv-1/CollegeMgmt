<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //

    protected $fillable = [

        'subjectName', 'course_id', 'isRegular', 'semester', 'year',
    ];


    public $timestamps = false;



    public function staffs(){
        return $this->belongsToMany(staffs::class, 'subject_staffs','staffs_id');

    }

    public function questions(){

        return $this->hasMany(Question::class);

    }


}
