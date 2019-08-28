<?php

namespace College\Http\Controllers\Exam;

use College\Course;
use College\Question;
use College\Subject;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExaminationController extends Controller
{


    public function approve()
    {

        $subject = DB::table('subjects')
            ->leftjoin('questions', 'questions.subject_id', '=', 'subjects.id')
            ->selectRaw('subjects.id, subjects.subjectName, count(questions.id) as questionId')
            ->groupBy("subjects.id", "subjects.subjectName")
            ->paginate(10);

        return view('examination.index')->with('subject', $subject);


    }


    public function viewQuestion($id)
    {

        //$qsn = Question::find($id)->answer()->get();

        //$qsn = Question::where('subject_id', $id)->get();

        $qsn = DB::table('questions')
            ->join('answers', 'answers.question_id', '=', 'questions.id')
            ->select('questions.id', 'questions.question', 'questions.set', 'answers.*')
            ->where('questions.subject_id', $id)
            ->where('approved', 0)
            ->get();


        return view('examination.viewQuestion')->with('question', $qsn);


    }


    public function conductExam(){

        $course = Course::all();
        return view('examination.conduct')->with('course',$course);

    }



    //
}
