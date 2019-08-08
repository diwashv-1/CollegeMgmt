<?php

namespace College\Http\Controllers\AjaxRequest;

use College\BookQuantity;
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

        $result = IssuedBooks::create([
            'student_Id' => $stdId,
            'teacher_Id' => 0,
            'Book_Id' => $bookId,
            'expire_Date' => $expireDate,
        ]);

        $bookQuantity = BookQuantity::where('Book_Id', $result->Book_Id)->first();

        $forNoBook = NoBookBlacklist::where('student_id', $stdId)->first();

//        dd($forNoBook);

        if ($forNoBook->countBook == 3) {

            array_push($errorMsg, 'Sorry ! The No of Book assigned limit reached.');

        } elseif ($forNoBook->countBook < 3) {
            $forNoBook->increment('countBook', 1);

            if ($bookQuantity->quantity >= 0) {

                $bookQuantity->decrement('quantity', 1);
            } else {
                array_push($errorMsg, 'Sorry! the Book is out of stock ');
            }

        } else {
            NoBookBlacklist::create([
                'student_id' => $stdId,
                'teacher_id' => 0,
                'countBook' => 1,
            ]);
        }


        return response()->json([
            'success' => true,
            'msg' => 'Issued Succesfully',
            'errorMsg' => $errorMsg
        ], 200);
    }
}


