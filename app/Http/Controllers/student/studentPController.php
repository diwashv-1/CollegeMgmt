<?php

namespace College\Http\Controllers\student;

use College\Attendance;
use College\Course;
use College\Exam;
use College\staffs;
use College\Student;
use College\Subject;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class studentPController extends Controller
{

    public function examDashboard()
    {

        $studentId = Student::StudentsId();

        $course = DB::table('students')
            ->join('subjects', 'subjects.course_id', '=', 'students.course_id')
            ->select('subjects.subjectName', 'subjects.id', 'subjects.semester')
            ->where('students.id', $studentId->id)
            ->orderBy('subjects.semester', 'asc')
            ->get();


        return view('student.examDashboard')->with('course', $course);

    }


    public function examStart($id)
    {

    }


    public function bookDetail()
    {

        $id = Student::studentsId();


        $check = DB::table('students')
            ->join('issued_books', 'students.id', '=', 'issued_books.student_id')
            ->join('book_codes', 'book_codes.id', '=', 'issued_books.Book_id')
            ->join('books', 'books.id', '=', 'book_codes.book_id')
            ->leftJoin('recieve_books', 'recieve_books.issue_id', '=', 'issued_books.id')
            ->select('students.studentName', 'issued_books.created_at', 'issued_books.expire_Date', 'issued_books.recieved',
                'books.bookName', 'recieve_books.returnedDate')
            ->where('students.id', $id->id)
            ->orderBy('issued_books.Book_id', 'asc')
            ->get();


        return view('student.viewBooks')->with('result', $check);

    }

    public function fetchAttendance(Request $request)
    {

        $data = array();
        $student = Student::StudentsId();
        $course = Student::find($student->id)->select('course_id')->first();

        $id = $student->id;
        $subject = Subject::select('id')
            ->where('semester', $request->sem)
            ->where('course_id', $course->course_id)
            ->orderBy('id', 'asc')
            ->get();

//        dd($subject[0]->id);
/*
        $result = DB::table('students')
            ->join('subjects', 'subjects.course_id','=','students.course_id')
            ->join('semesters','semesters.semester','=','subjects.semester')
            ->join('attendance','attendance.student_id')*/

        $attendance = DB::table('attendance')
            ->join('subjects', 'subjects.id','=','attendance.subject_id')
            ->select('attendance.*','subjects.subjectName')
            ->where('student_id', $student->id)
            ->where('month', $request->date)
            ->orderBy('date', 'asc')
            ->get();



        dd($subject);


    }

}
