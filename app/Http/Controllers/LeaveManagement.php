<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaveData = Leave::with('userData')->where('department_id', Auth::user()->department_id)->paginate();
        return view('content.Leave.LeaveManagement', ['leaveData' => $leaveData]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leaveData = Leave::with('userData')->where('id', $id)->get();
        //return ($leaveData[0]);
        return view('content.Leave.LeaveDetails', ['leaveData' => $leaveData[0]]);
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
        $validate = $request->validate([
            'o_status' => 'required'
        ]);
        if ($validate) {
            $LeaveUpdate = Leave::where('id', $id)->update([
                'status' => $request->o_status
            ]);
            if ($LeaveUpdate) {
                return back()->with('updateSuccessOrder', "order Updated");
            } else {
                return back()->with('updateErrorOrder', "order Not Updated");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave = Leave::find($id);
        if ($leave->delete()) {
            return back()->with('successDeleteOrder', 'Deleted');
        } else {
            return back()->with('errorDeleteOrder', ' Not Deleted');
        }
    }
}
