<?php

namespace College\Http\Controllers;

use College\Http\Requests\createStudentRequest;
use College\Membership;
use College\NoBookBlacklist;
use College\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('auth');


    }



    public function index()
    {

        return view('administration.studentDetail')->with('student', Student::all());
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(createStudentRequest $request)
    {
        $enrolledDate = substr($request->std_enro, 0, 4);
        $image = $request->std_image->store('student', 'public');
//        dd($image);
        //dd($request->cou, $request->fac);
        $student = Student::create([
            'studentName' => $request->std_name,
            'address' => $request->std_add,
            'gender' => $request->std_gend,
            'studentImage' => $image,
            'fatherName' => $request->std_fath,
            'phoneNumber' => $request->std_num,
            'facultyId' => 1,
            'courseId' => 1,
            'enrolledyear' => $request->std_enro,
            'email' => $request->std_email,
            'enrolledDate' => $enrolledDate,
            'studentCode' => 222

        ]);

        $forMemId = $student->id;
        $currentDate = date('Y-m-d');
        $expireDate = date('Y-m-d', strtotime($currentDate . '+365 days'));

//create Membership for this student
        Membership::create([
            'studentId' => $forMemId,
            'issuedDate' => $currentDate,
            'expiryDate' => $expireDate
        ]);

        //crate no_of_book count for student
        NoBookBlacklist::create([

            'student_id' => $forMemId,
             'countBook' => 0,
            'teacher_id' => 0
        ]);


        session()->flash('success', 'Student/Library Membership created Succesfully');
        return redirect('/manage');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Student $student)
    {


        return view('administration.manageAll')->with('student', $student);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
