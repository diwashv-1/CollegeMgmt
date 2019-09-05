<?php

namespace College\Http\Controllers;

use College\Course;
use College\Faculty;
use College\staffs;
use College\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class addController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');


    }


    public function index()
    {


        $faculty = Faculty::distinct()->pluck('facultyName', 'id');
        $course = Course::distinct()->pluck('courseName', 'id');

        return view('administration.ManageAll')
            ->with('faculty', $faculty)
            ->with('course', $course);

    }


    public function addCourse(Request $request)
    {
        $this->validate(request(), [
            'courseName' => 'required',
            'courseCode' => 'required'
        ]);

        Course::create([
            'courseName' => $request->courseName,
            'courseCode' => $request->courseCode,
            'facultyId' => $request->selectFac,
            'timePeriod' => $request->timePeriod
        ]);

        session()->flash('success', 'Course Added Succesfully');
        return redirect('/manage');
    }


    public function libraryIndex()
    {
        return view('library.libraryDashboard');
    }

    public function Booksmanage()
    {
        return view('library.manageBooks');
    }

    public function Booksissue()
    {
        return view('library.issueBooks');
    }


    public function libraryCard()
    {
        $res = DB::table('students')->select('students.enrolledDate')->distinct()->get();
        return view('library.libraryCard')->with('result', $res);

    }


    //
}
