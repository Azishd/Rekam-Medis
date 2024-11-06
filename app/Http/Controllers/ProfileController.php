<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use App\Models\Doctor;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function edit()
    {
        if (Auth::guard('admins')->check()){ return redirect('profile'); }
        return view('profile.edit');
    }

    public function update(Request $request){
        // dd($request->all());
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric',
                'age' => 'required|numeric',
                'gender' => 'not_in:null',
            ],
            [
                'firstname.required' => 'Firstname can\'t be empty!',
                'lastname.required' => 'Lastname can\'t be empty!',
                'address.required' => 'Address can\'t be empty!',
                'phone.required' => 'Phone number can\'t be empty!',
                'phone.numeric' => 'Phone number can only contain number 0-9!',
                'age.required' => 'Age can\'t be empty!',
                'age.numeric' => 'Age must be numeric!',
                'gender.not_in' => 'Gender can\'t be empty!',
            ]
        );

        if ($request->role == "patient"){
            Patient::findOrFail($request->id)->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'address' => $request->address,
                'phone' => $request->phone,
                'age' => $request->age,
                'gender' => $request->gender
            ]);
        }
        else if ($request->role == "doctor") {
            Doctor::findOrFail($request->id)->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'address' => $request->address,
                'phone' => $request->phone,
                'age' => $request->age,
                'gender' => $request->gender
            ]);
        }

        return redirect('profile');
    }
}
