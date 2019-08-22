<?php

namespace College\Http\Controllers\teacher;

use College\staffs;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    //

    public function prepareQuestion(){

/*$email = Auth::user()->teacher_id;

$teacherId = staffs::where('emai')

*/


        return view('teacher.question');





    }




}
