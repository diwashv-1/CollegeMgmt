<?php

namespace College\Http\Controllers;

use Carbon\Carbon;
use College\Http\Requests\createStudentRequest;
use College\Membership;
use College\NoBookBlacklist;
use College\Semester;
use College\Student;
use College\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

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


        $student = Student::create([
            'studentName' => $request->std_name,
            'address' => $request->std_add,
            'gender' => $request->std_gend,
            'studentImage' => $image,
            'fatherName' => $request->std_fath,
            'phoneNumber' => $request->std_num,
            'faculty_id' => $request->fac,
            'course_id' => $request->cou,
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
            'teacheId' => null,
            'issuedDate' => $currentDate,
            'expiryDate' => $expireDate
        ]);

        //crate no_of_book count for student
        NoBookBlacklist::create([

            'student_id' => $forMemId,
            'countBook' => 0,
            'blackList' => 0,
        ]);

        //create User Registration

        $current = Carbon::today('Asia/Kathmandu');
        $update = $current->addMonth(6);

        if ($student) {
            User::create([
                'name' => $request->std_name,
                'email' => $student->email,
                'password' => Hash::make($request->std_num),
                'role_id' => 3
            ]);

            Semester::create([
               'student_id' => $student->id,
               'semester' =>1,
               'initialDate'=>$request->std_enro,
                'updateDate'=>$update,
            ]);
        }

        session()->flash('success', 'Student/Library Membership created Succesfully');
        return view('Admision.student');
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
