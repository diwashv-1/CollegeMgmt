<?php

namespace College\Http\Controllers;

use College\Http\Requests\createStaffRequest;
use College\StaffRole;
use College\staffs;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administration.staffDetail')->with('staff', staffs::all());



        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createStaffRequest $request)
    {

//dd($request->all());
        $image = $request->sta_image->store('staffs', 'public');

        staffs::create([

            'staffName'=> $request->sta_name,
            'staffGender' => $request->sta_gend,
            'staffAddress'=> $request->sta_add,
            'staffImage'=> $image,
            'contactNumber'=> $request ->sta_num,
            'enrolledYear'=> $request -> sta_enro,
            'roleId'=> 1
        ]);



        session()->flash('success', 'Staff Added Succesfully');
        return redirect('/manage');
        //
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
