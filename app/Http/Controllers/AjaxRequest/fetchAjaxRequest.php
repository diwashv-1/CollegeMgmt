<?php

namespace College\Http\Controllers\AjaxRequest;

use College\BookCodes;
use College\Course;
use College\Faculty;
use College\Student;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class fetchAjaxRequest extends Controller
{
    public function fetchAjaxFaculty()
    {

        $result = Faculty::all();

        return response()->json([
            'status' => 'success',
            'result' => $result
        ], 200);
    }

    public function fetchAjaxCourse(Request $request)
    {

        $res = DB::table('courses')
            ->where('facultyId', $request->id)
            ->select('id', 'courseName')
            ->get();

        return response()->json([
            'success' => 'success',
            'res' => $res
        ], 200);
    }

    public function fetchAjaxStudent(Request $request)
    {
        $this->validate(request(), [
            'facId' => 'required',
            'couId' => 'required',
            'enrYear' => 'required'
        ]);


        $result = DB::table('students')
            ->join('faculties', 'faculties.id', '=', 'students.facultyId')
            ->join('courses', 'courses.Id', '=', 'students.courseId')
            ->select('students.*', 'faculties.facultyName', 'courses.courseName')
            ->where('students.enrolledDate', '=', $request->enrYear)
            ->where('students.courseid',$request->couId)
            ->get();


        return response()->json([
            'success' => 'success',
            'result' => $result
        ], 200);
    }


    public function fetchAjaxStudentBookDetail(Request $request)
    {
        //get student Id
        // $stdId = Student::select('id')->where('studentCode', $request->data)->first();
//        dd($stdId->id);

        $currentDate = date('Y-m-d');

        $result = DB::table('students')
            ->join('issued_Books', 'issued_Books.student_Id', '=', 'students.id')
            ->join('Books', 'Books.id', '=', 'issued_Books.Book_Id')
            ->select('students.studentName', 'Books.bookName', 'issued_Books.expire_Date')
            ->where('students.studentCode', $request->data)
            ->Where('issued_books.expire_Date', '>=', $currentDate)
            ->get();




        if (isset($result)) {
            return response()->json([
                'success' => 'success',
                'result' => $result
            ], 200);

        } else {
            die();
        }
    }



    public function fetchAjaxFurtherBook(Request $request){

        $result = BookCodes::where('book_id', $request->book_id)->select('code','issue')->get();

        return response()->json([

           'msg'=>'success',
           'result'=>$result
        ], 200);
    }


}

