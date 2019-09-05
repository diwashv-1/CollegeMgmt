<?php

namespace College\Http\Controllers\Exam;

use College\Exam;
use College\Subject;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;

class examAjaxController extends Controller
{

    public function fetchSubject(Request $request)
    {

        $subject = Subject::select('id', 'subjectName')->where('course_id', $request->id)->get();

        return response()->json([
            'msg' => 'success',
            'result' => $subject
        ], 200);

    }


    public function saveAjaxExam(Request $request)
    {

        foreach ($request->data as $value) {
                $exam = Exam::create([

                    'examName' => $value['subjectName'],
                    'subject_id' => $value['subject'],
                    'examDate' => $value['date'],
                    'time' => $value['time'],
                    'course_id' => $value['course'],
                    'questionT' => $value['question'],
                    'fm' => $value['markF'],
                    'pm' => $value['markP'],
                ]);
            }


        if ($exam) {

            return response()->json([
                'msg' => 'success',
            ], 200);


        }

    }


    //
}
