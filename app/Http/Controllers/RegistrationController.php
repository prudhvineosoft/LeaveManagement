<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;

class RegistrationController extends Controller
{
    public function hodRegistration()
    {
        $Departments = department::all();
        return view('content.signup.HodSignup', ['departmentData' => $Departments]);
    }
    public function staffRegistration()
    {
        $Departments = department::all();
        return view('content.signup.StaffSignup', ['departmentData' => $Departments]);
    }
    public function addUser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'UserName' => ['required', 'string', 'max:255', 'unique:users'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required'],
            'department' => ['required'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $file = $request->file('file');
        $dest = public_path('/uploads');
        $fname = "Image-" . rand() . "-" . time() . "." . $file->extension();
        $file->move($dest, $fname);

        // $user = User::create([
        //     'name' => $request->name,
        //     'UserName' => $request->UserName,
        //     'Email' => $request->Email,
        //     'phone' => $request->phone,
        //     'department' => $request->department,
        //     'password' => Hash::make($request->password),
        //     'image_path' => $fname
        // ]);

        $newUser = new User();
        $newUser->name = $request->name;
        $newUser->UserName = $request->UserName;
        $newUser->Email = $request->Email;
        $newUser->phone = $request->phone;
        $newUser->department_id = $request->department;
        $newUser->password = Hash::make($request->password);
        $newUser->image_path = $fname;
        $newUser->save();

        $newUser->attachRole($request->role);

        event(new Registered($newUser));

        Auth::login($newUser);

        return redirect(RouteServiceProvider::HOME);
    }
}
