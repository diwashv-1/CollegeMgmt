<?php

namespace College\Http\Controllers;

use College\Course;
use College\Faculty;
use College\Student;
use College\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->name;
        return view(Auth::user()->role->name)->with('user', $user);
    }

    public function libraryStudents()
    {


        $res = Student::select('enrolledDate')->distinct()->get();

        return view('library.libraryStudents')
            ->with('result', $res)
            ->with('course', Course::all())
            ->with('faculty', Faculty::all());


    }


    public function checkfetchLibraryDetail($id)
    {

        echo $id;

        dd();


    }


}
