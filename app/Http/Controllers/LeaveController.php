<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::where('user_id', Auth::user()->id)->paginate();
        return view('content.Leave.LeaveCrud', ['leaves' => $leaves]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.Leave.LeaveApplication');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'FromDate' => 'required',
            'ToDate' => 'required',
            'reason' => 'required',
        ]);
        if ($validate) {
            $leave = new Leave();
            $leave->user_id = Auth::user()->id;
            $leave->department_id = Auth::user()->department->id;
            $leave->leave_from_date = $request->FromDate;
            $leave->leave_to_date = $request->ToDate;
            $leave->reason = $request->reason;
            if ($leave->save()) {
                return redirect('leaves')->with('successCoupon', 'Coupon Added');
            } else {
                return redirect('leaves')->with('errorCoupon', 'Coupon Not Added');
            }
        }
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
        return view('content.Leave.LeaveDetailsForUser', ['leaveData' => $leaveData[0]]);
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
