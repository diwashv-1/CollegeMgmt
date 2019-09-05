<?php

namespace College\Http\Controllers\AjaxRequest;

use College\BookCodes;
use College\BookQuantity;
use College\Http\Resources\human;
use College\IssuedBooks;
use College\NoBookBlacklist;
use College\RecieveBooks;
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


        $stdId = $resultData[0]->id;
        $bookCodesId = $resultData[1]->id;
//        dd($bookCodesId);


        $bookCodes = BookCodes::where('id', $bookCodesId)->first();

        // dd($bookCodes);
        $bookQuantity = BookQuantity::where('Book_Id', $bookCodes->book_id)->first();
        $forNoBook = NoBookBlacklist::where('student_id', $stdId)->first();

        if (isset($forNoBook)) {
            if ($forNoBook->countBook == 3) {

                array_push($errorMsg, 'Sorry ! The No of Book assigned limit reached.');
                goto end;

            } elseif ($forNoBook->countBook < 3) {

                if ($bookQuantity->quantity > 0 && $bookCodes->issue < 1) {

                    $forNoBook->increment('countBook', 1);
                    $bookQuantity->decrement('quantity', 1);
                    $bookCodes->update(['issue' => 1]);

                    IssuedBooks::create([
                        'student_Id' => $stdId,
                        'teacher_Id' => 1,
                        'Book_Id' => $bookCodes->id,
                        'expire_Date' => $expireDate,
                        'recieved' => 0
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
                'teacher_id' => 1,
                'countBook' => 1,
                'blackList' => 0
            ]);

            $bookQuantity->decrement('quantity', 1);
            IssuedBooks::create([
                'student_Id' => $stdId,
                'teacher_Id' => 1,
                'Book_Id' => $bookCodesId,
                'expire_Date' => $expireDate,
                'recieved' => 0
            ]);
            $bookCodes->increment('issue', 1);


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
        $this->validate($request, [

        ]);


        $resultData = $this->stdCodeBookCode($request->stdCode, $request->bookCode);

        //dd($resultData);

        $stdId = $resultData[0]->id;
        $bookCodesId = $resultData[1]->id;


        $bookCodes = BookCodes::where('id', $bookCodesId)->first();

        $bookQuantity = BookQuantity::where('Book_Id', $bookCodes->book_id)->first();

        $forNoBook = NoBookBlacklist::where('student_id', $stdId)->first();


        $Issued = IssuedBooks::latest()
            ->where('student_id', $stdId)
            ->where('Book_id', $bookCodesId)
            ->first();


        $currentDate = date('Y-m-d');

        if ($currentDate > $Issued->expire_Date) {
            RecieveBooks::create([
                'issue_id' => $Issued->id,
                'returnedDate' => $currentDate
            ]);
            $bookQuantity->increment('quantity', 1);
            $bookCodes->update([
                'issue' => 0
            ]);
            $forNoBook->increment('blackList', 1);
            $Issued->update([
                'recieved' => 1
            ]);
        } else {
            RecieveBooks::create([
                'issue_id' => $Issued->id,
                'returnedDate' => $currentDate
            ]);

            $bookQuantity->increment('quantity', 1);
            $bookCodes->update([
                'issue' => 0

            ]);
            $forNoBook->decrement('countBook', 1);
            $Issued->update([
                'recieved' => 1
            ]);
        }

        return response()->json([
            'msg' => 'success Recieved Succesfully'

        ]);
    }

    public function saveBooksTeacher(Request $request)
    {

        $result = $this->tchCodeBookCode($request->tchCode, $request->bookCodeT);

        $errorMsg = [];
        $currentDate = date('Y-m-d');
        $expireDate = date('Y-m-d', strtotime($currentDate . '+30 days'));

        $tchId = $result[0]->id;
        $bookCodesId = $result[1]->id;

        $bookCodes = BookCodes::where('id', $bookCodesId)->first();

        $bookQuantity = BookQuantity::where('Book_Id', $bookCodes->book_id)->first();
        $forNoBook = NoBookBlacklist::where('teacher_id', $tchId)->first();

        if (isset($forNoBook)) {
            if ($forNoBook->countBook == 3) {

                array_push($errorMsg, 'Sorry ! The No of Book assigned limit reached.');
                goto end;

            } elseif ($forNoBook->countBook < 3) {

                if ($bookQuantity->quantity > 0 && $bookCodes->issue < 1) {

                    IssuedBooks::create([
                        'student_Id' => 0,
                        'teacher_Id' => $tchId,
                        'Book_Id' => $bookCodes->id,
                        'expire_Date' => $expireDate,
                        'recieved' => 0
                    ]);

                    $forNoBook->increment('countBook', 1);
                    $bookQuantity->decrement('quantity', 1);
                    $bookCodes->update(['issue' => 1]);



                    goto success;
                } else {
                    array_push($errorMsg, 'Sorry! the Book is out of stock ');
                    goto end;
                }

            }
        } else {
            NoBookBlacklist::create([
                'student_id' => 0,
                'teacher_id' => $tchId,
                'countBook' => 1,
                'blackList' => 0
            ]);

            $bookQuantity->decrement('quantity', 1);
            IssuedBooks::create([
                'student_Id' => 0,
                'teacher_Id' => $tchId,
                'Book_Id' => $bookCodesId,
                'expire_Date' => $expireDate,
                'recieved' => 0
            ]);
            $bookCodes->increment('issue', 1);


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



    public function tchCodeBookCode($tchCode, $bookCode)
    {

        $data = [];
        $teacher = DB::table('staffs')
            ->where('staffCode', '=', $tchCode)
            ->where('roleId', 2)
            ->select('id')->first();

        $book = Db::table('book_codes')
            ->where('code', $bookCode)
            ->select('id')->first();

        array_push($data, $teacher, $book);

        return $data;
    }

    public  function stdCodeBookCode($stdCode, $bookCode)
    {

        $data = [];
        $student = DB::table('students')
            ->where('studentCode', '=', $stdCode)
            ->select('id')->first();
        $book = Db::table('book_codes')
            ->where('code', $bookCode)
            ->select('id')->first();

        array_push($data, $student, $book);

        return $data;
    }


    public
    function saveFurtherBooksAjax(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:book_codes'
        ]);


        $result = BookCodes::create([

            'book_id' => $request->bookId,
            'code' => $request->code
        ]);


        return response()->json([
            'msg' => 'success',
            'result' => $result
        ], 200);
    }
}




