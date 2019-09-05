<?php

namespace College\Http\Controllers\teacher;

use College\Question;
use College\staffs;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    //

    public function prepareQuestion()
    {
        $teacherId = staffs::staffsId();
//dd($teacherId->id);


        $subject = staffs::find($teacherId->id)->subjects()->pluck('id', 'subjectName');
        return view('teacher.question')->with('subject', $subject);


    }


    public function showQuestion()
    {
        $teacherid = staffs::staffsId();


        $result = DB::table('questions')
            ->join('answers', 'answers.id', '=', 'questions.id')
            ->select('questions.question', 'questions.set', 'answers.*')
            ->where('questions.staff_id', $teacherid->id)
            // ->where('approved', 1)
            ->get();


        return view('teacher.showQuestion');
    }

}
