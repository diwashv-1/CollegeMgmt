<?php

namespace College\Http\Controllers\AjaxRequest;

use College\BookCodes;
use College\BookQuantity;
use College\Http\Resources\human;
use College\IssuedBooks;
use College\NoBookBlacklist;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function Sodium\increment;

class saveAjaxRequest extends Controller
{
    //
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function saveAjaxIssuedBooks(Request $request)
    {
        $this->validate(request(), [
        ]);

        $errorMsg = [];

        $currentDate = date('Y-m-d');
        $expireDate = date('Y-m-d', strtotime($currentDate . '+30 days'));

        $resultData = $this->stdCodeBookCode($request->stdCode, $request->bookCode);

        /*foreach($student as $res){
            dd($res->id);
        }*/
        /*   without above function
                $stdId = $student[0]->id;
                $bookId = $book[0]->id;*/

        $stdId = $resultData[0]->id;
        $bookId = $resultData[1]->id;


        $bookQuantity = BookQuantity::where('Book_Id', $bookId)->first();

        $forNoBook = NoBookBlacklist::where('student_id', $stdId)->first();

//        dd($forNoBook);

        if (isset($forNoBook)) {
            if ($forNoBook->countBook == 3) {

                array_push($errorMsg, 'Sorry ! The No of Book assigned limit reached.');
                goto end;

            } elseif ($forNoBook->countBook < 3) {

                if ($bookQuantity->quantity > 0) {

                    $forNoBook->increment('countBook', 1);
                    $bookQuantity->decrement('quantity', 1);
                    IssuedBooks::create([
                        'student_Id' => $stdId,
                        'teacher_Id' => 0,
                        'Book_Id' => $bookId,
                        'expire_Date' => $expireDate,
                    ]);
                    goto success;
                } else {
                    array_push($errorMsg, 'Sorry! the Book is out of stock ');
                    goto end;
                }

            }
        } else {
            NoBookBlacklist::create([
                'student_id' => $stdId,
                'teacher_id' => 0,
                'countBook' => 1,
            ]);

            $bookQuantity->decrement('quantity', 1);
            IssuedBooks::create([
                'student_Id' => $stdId,
                'teacher_Id' => 0,
                'Book_Id' => $bookId,
                'expire_Date' => $expireDate,
            ]);

            goto success;
        }

        end:{
        return response()->json([
            'success' => false,
            'errorMsg' => $errorMsg
        ], 200);

    }

        success:{
        return response()->json([
            'success' => true,
            'msg' => 'Issued Succesfully'
        ]);
    }
    }


    public function saveRecievedBooksAjax(Request $request)
    {
        $this->validate(request(), [

        ]);


        $resultData = $this->stdCodeBookCode($request->stdCode, $request->bookCode);

        dd($resultData);

        $stdId = $resultData[0]->id;
        $bookId = $resultData[1]->id;
    }


    public function stdCodeBookCode($stdCode, $bookCode)
    {

        $data = [];
        $student = DB::table('students')
            ->where('studentCode', '=', $stdCode)
            ->select('id')->first();
        $book = Db::table('books')
            ->where('bookCode', $bookCode)
            ->select('id')->first();

        array_push($data, $student, $book);

        return $data;
    }


    public function saveFurtherBooksAjax(Request $request)
    {
        $result =  BookCodes::create([

            'book_id'=>$request->bookId,
            'code' => $request->bookCode
        ]);


        return response()->json([
            'msg'=>'success',
            'result' =>$result
        ], 200);
    }
}




