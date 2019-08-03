<?php

namespace College\Http\Controllers;

use College\Course;
use College\staffs;
use College\Student;
use Illuminate\Http\Request;

class addController extends Controller
{
    public function index()
    {

        return view('administration.ManageAll');

    }


    public function addCourse(Request $request)
    {

        //dd($request->all());

        $this->validate(request(), [
            'courseName' => 'required',
            'courseCode' => 'required'
        ]);


        Course::create([
            'courseName' => $request->courseName,
            'courseCode' => $request->courseCode,
            'facultyId' => $request->selectFac
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

    public function Booksissue(){
        return view('library.issueBooks');
    }




    public function libraryCard(){
        return View('library.libraryCard')->with('student', Student::all())->union('staffs', staffs::all());
       // return view('library.libraryCard')->with('student', Student::all());

    }

    //
}
