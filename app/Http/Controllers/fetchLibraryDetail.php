<?php

namespace College\Http\Controllers;

use College\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class fetchLibraryDetail extends Controller

{
// FOR STUDENTS
    public function fetchLibDetail($id)
    {
        $res = Student::find($id)->books;

        $check = DB::table('students')
            ->join('issued_books', 'students.id', '=', 'issued_books.student_id')
            ->join('book_codes', 'book_codes.id', '=', 'issued_books.Book_id')
            ->join('books', 'books.id', '=', 'book_codes.book_id')
            ->leftJoin('recieve_books', 'recieve_books.issue_id', '=', 'issued_books.id')
            ->select('students.studentName', 'issued_books.created_at', 'issued_books.expire_Date', 'issued_books.recieved',
                'books.bookName', 'recieve_books.returnedDate')
            ->where('students.id', $id)
            ->orderBy('issued_books.Book_id', 'asc')
            ->get();



        return view('library.fetchStudentDetail')->with('result', $check);


    }



    public function checkLibStudents()
    {

        $result = DB::table('students')
            ->join('no_book_blacklists', 'no_book_blacklists.student_id', '=', 'students.id')
            ->join('faculties', 'faculties.id', '=', 'students.faculty_id')
            ->select('students.id', 'students.studentName', 'students.studentCode', 'students.address', 'faculties.facultyName',
                'no_book_blacklists.countBook', 'no_book_blacklists.blackList')
            ->get();

        return view('library.libraryStudentsPartial')->with('student', $result);

    }


    //
}
