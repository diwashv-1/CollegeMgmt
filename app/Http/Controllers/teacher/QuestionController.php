<?php

namespace College\Http\Controllers\teacher;

use College\staffs;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    //

    public function prepareQuestion()
    {

        $email = Auth::user()->email;

//        dd($email);

        $teacherId = staffs::where('email', $email)->select('id', 'staffCode')->first();

        return view('teacher.question');

    }


}
