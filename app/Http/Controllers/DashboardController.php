<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('HOD')) {
            $staffCount = User::where('department_id', Auth::user()->department_id)->whereNot('id', Auth::user()->id)->count();
            return view('dashboard', ['staffCount' => $staffCount]);

            // https://prudhvineosoft.github.io/covid19/
        } elseif (Auth::user()->hasRole('staff')) {
            $staffLeaves = Leave::where('user_id', Auth::user()->id)->count();
            $accepted =  Leave::where('user_id', Auth::user()->id)->where('status', 'Accepted')->count();
            $rejected =  Leave::where('user_id', Auth::user()->id)->where('status', 'Rejected')->count();
            return view('staffDashboard', ['staffLeaves' => $staffLeaves, 'accepted' => $accepted, 'rejected' => $rejected]);
        }
    }
}
