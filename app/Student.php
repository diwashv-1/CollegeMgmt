<?php

namespace College;
use College\IssuedBooks;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Student extends Model
{

    protected $fillable =[
        'studentName',
        'address',
        'gender',
        'studentImage',
        'fatherName',
        'phoneNumber',
        'faculty_id' ,
        'course_id' ,
        'enrolledyear' ,
        'email',
        'enrolledDate',
        'studentCode'
    ];
    //


      public function semester(){
          return $this->hasOne('semesters');

      }

    public function books(){
        return $this-> hasMany('College\IssuedBooks', 'student_id');
    }

    public function issue(){

        return $this->hasManyThrough(
            'College\RecieveBooks',
            'College\IssuedBooks',
            'student_id',
            'issue_id');
    }

    public function scopeStudentsId(){

        $email = Auth::user()->email;
        return $teacherId = Student::where('email', $email)->select('id')->first();




    }


}
