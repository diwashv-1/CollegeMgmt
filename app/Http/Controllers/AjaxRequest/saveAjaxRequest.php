<?php

namespace College\Http\Controllers\AjaxRequest;

use College\IssuedBooks;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class saveAjaxRequest extends Controller
{
    //


    public function saveAjaxIssuedBooks(Request $request)
    {

        $this->validate( request(), [



        ]);

        $stdCode = $request->stdCode;
        $bookCode = $request->bookCode;

        $student = DB::table('students')
            ->where('studentCode', $stdCode)
            ->select('id')->get();

        $book = Db::table('books')
            ->where('bookCode', $bookCode)
            ->select('id')->get();

        /*foreach($student as $res){
            dd($res->id);
        }*/

        $stdId = $student[0]->id;
        $bookId = $book[0]->id;
        $currentDate = date('Y-m-d');
        $expireDate = date('Y-m-d', strtotime($currentDate . '+30 days'));


       $result =  IssuedBooks::create([

           'student_Id'=> $stdId,
           'teacher_Id' =>0,
           'Book_Id' => $bookId
        ]);

       if($result){
           //session()->flash('success', 'Added Successfully');
            return response()->json([
                'success' => true,
                'msg' =>'Issued Succesfully'
            ], 200) ;
       }
       else{
           die();
       }
    }
}
