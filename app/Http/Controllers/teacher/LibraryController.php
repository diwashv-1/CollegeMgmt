<?php

namespace College\Http\Controllers\teacher;
use College\staffs;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    //

    public function bookIndex()
    {

        $id = staffs::staffsId();
        dd($id->id);

        return view('teacher.issueBooks');


    }



}
