<?php

namespace College\Http\Controllers\teacher;
use Illuminate\Http\Request;
use College\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    //

    public function bookIndex()
    {

        $user = Auth::user()->role_id;

        //Auth::id();


        dd($user);


        return view('teacher.issueBooks');


    }


}
