<?php

namespace College\Http\Controllers;

use College\Http\Requests\createStaffRequest;
use College\Membership;
use College\StaffRole;
use College\staffs;
use College\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $image = $request->sta_image->store('staffs', 'public');

        $staff = staffs::create([

            'staffName' => $request->sta_name,
            'staffGender' => $request->sta_gend,
            'staffAddress' => $request->sta_add,
            'staffImage' => $image,
            'contactNumber' => $request->sta_num,
            'enrolledYear' => $request->sta_enro,
            'roleId' => 2,
            'email' => $request->staff_email,
            'staffCode' => 220,
        ]);


        $currentDate = date('Y-m-d');
        $expireDate = date('Y-m-d', strtotime($currentDate . '+365 days'));


        Membership::create([
            'teacheId' => $staff->id,
            'issuedDate' => $currentDate,
            'expiryDate' => $expireDate,

        ]);


        User::create([
            'name' => $request->sta_name,
            'password' => Hash::make($request->sta_num),
            'email' => $request->staff_email,
            'role_id' => $staff->roleId,
        ]);


        session()->flash('success', 'Staff Added Succesfully');
        return redirect('/manage');
        //
    }


    public function show($id)
    {
        //
    }

    /**x
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
