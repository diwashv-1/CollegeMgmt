<?php

namespace College\Http\Controllers\AjaxRequest;

use College\Answer;
use College\Question;
use College\staffs;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class saveAjaxQuestion extends Controller
{

    public function savequestion(Request $request)
    {

        $email = Auth::user()->email;

        $teacherId = staffs::where('email', $email)->select('id')->first();

        foreach ($request->tableData as $req) {
            $question = '';
            $question = Question::create([
                'question' => $req['question'],
                'set' => $request->set,
                'staff_id' => $teacherId->id,
                'subject_id' => $request->subject,
                'approved' => 0,
            ]);

            Answer::create([
                'question_id' => $question->id,
                'option1' => $req['option1'],
                'option2' => $req['option2'],
                'option3' => $req['option3'],
                'option4' => $req['option4'],
                'correct' => $req['correct'],
            ]);
        }


        return response()->json([
            'msg' => 'success Fully Added',

        ]);

    }


    public function questionApprove( Request $request)
    {
        $res = Question::find($request->id);
        $res->update(['approved'=> 1]);




        return response()->json([
            'msg' => 'success',
        ]);


    }


    //
}
