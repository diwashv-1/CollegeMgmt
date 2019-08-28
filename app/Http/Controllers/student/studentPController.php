<?php

namespace College\Http\Controllers\student;

use College\staffs;
use College\Student;
use College\Subject;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class studentPController extends Controller
{

    public function  examDashboard(){

             $studentId = Student::StudentsId();

               $course =  DB::table('students')
                   ->join('subjects','subjects.course_id','=','students.courseId')
                   ->select('subjects.subjectName','subjects.id','subjects.semester')
                   ->where('students.id', $studentId->id)
                   ->orderBy('subjects.semester','asc')
                   ->get();



               return view('student.examDashboard')->with('course',$course);

    }


    public function examStart($id){


        dd();
    }

}