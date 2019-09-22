<?php

namespace College\Http\Controllers\student;

use College\Answer;
use College\Exam;
use College\Question;
use College\Result;
use College\Student;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{


    public function examStart($id)
    {
        $exams = Exam::where('subject_id', $id)->get();

        return view('student\examStart')->with('exam', $exams);

    }


    public function start($id)
    {
        $idS = Student::StudentsId();


        $exam = Exam::where('id', $id)->first();
        $dates = date('Y-m-d H:i:s');
        $date = substr($dates, 0, 10);
        $time = substr($dates, 10, 6);

        $result = Result::where('exam_id', $exam->id)
            ->where('student_id', $idS->id)
            ->first();


        if ($result) {
            $msg = 'Exam already Taken at' . $result->created_at;
            $true = 2;
            return view('student\exam')
                ->with('msg', $msg)
                ->with('exam', $exam)
                ->with('true', $true);

        } else if ($date == $exam->examDate && $time <= $exam->examDate) {
            $exam = Exam::where('id', $id)->first();

            $qsn = DB::table('questions')
                ->join('answers', 'answers.question_id', '=', 'questions.id')
                ->select('questions.id', 'questions.question', 'answers.*')
                ->where('questions.subject_id', $exam->subject_id)
                ->where('questions.approved', '=', '1')
                ->limit($exam->questionT)//limit not of qsn
                ->inRandomOrder()
                ->get();
            $true = 1;

            return view('student\exam')
                ->with('qsn', $qsn)
                ->with('true', $true)
                ->with('exam', $exam)
                ->with('result', $result);
        } else {
            $true = 0;
            return view('student\exam')
                ->with('exam', $exam)
                ->with('true', $true)
                ->with('result', $result);
        }
    }

    public function saveAnswer(Request $request)
    {
        $id = Student::StudentsId();
        $data = $request->all();
        $wrong = 0;
        $correct = 0;
        $nonAttempt = 0;
        $exam_id = $data['examId'];
        foreach ($request->all() as $key => $value) {
//                    DB::table('questions')->join('answers', 'answers.question_id','=','questions.id')             ->select('answers*')             ->where('questions')
            $answer = Answer::where('question_id', $key)->first();
            if ($value == 'a') {
                $nonAttempt++;
                $wrong++;
            } else if (!empty($answer)) {
                if ($answer->correct == $value) {
                    $correct++;
                } elseif ($answer->correct != $value) {
                    $wrong++;
                }
            }
        }

      $result =  Result::create([
            'student_id' => $id->id,
            'exam_id' => $exam_id,
            'totalQsn' => $wrong + $correct,
            'nonAttemptQsn' => $nonAttempt,
            'correct' => $correct,
            'wrong' => $wrong,
        ]);

        return view('student.examResult')
            ->with('result', $result);


    }

    public function examResult(){
        $id = Student::StudentsId();
         $result = DB::table('results')
                ->join('exams','exams.id','=','results.exam_id')
                ->select('exams.id','exams.examName','results.*')
                ->where('results.student_id',$id->id)
                ->get();
        return view('student/result')->with('result', $result);

    }

}
