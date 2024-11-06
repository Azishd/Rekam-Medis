<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Patient;
use App\Models\Doctor;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->intended('dashboard');
        }
        else if (Auth::guard('doctors')->check()) {
            return redirect()->intended('dashboard');
        }
        else if (Auth::guard('admins')->check()) {
            return redirect()->intended('dashboard');
        }
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $creds = $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email can\'t be empty!',
                'password.required' => 'Password can\'t be empty!'
            ]
        );

        if (Auth::guard('web')->attempt($creds)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        else if (Auth::guard('doctors')->attempt($creds)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        else if (Auth::guard('admins')->attempt($creds)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register()
    {
        if (Auth::guard('web')->check()) {
            return redirect()->intended('dashboard');
        }
        else if (Auth::guard('doctors')->check()) {
            return redirect()->intended('dashboard');
        }
        else if (Auth::guard('admins')->check()) {
            return redirect()->intended('dashboard');
        }
        return view('auth.register');
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|unique:patients|unique:doctors|unique:admins',
                'password' => 'required|min:6',
                'firstname' => 'required',
                'lastname' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric',
                'age' => 'required|numeric',
                'gender' => 'not_in:null',
                'role' => 'not_in:null'
            ],
            [
                'email.required' => 'Email can\'t be empty!',
                'email.email' => 'Email is not valid!',
                'email.unique' => 'Email already registered!',
                'password.required' => 'Password can\'t be empty!',
                'password.min' => 'Password must be at least 6 characters!',
                'firstname.required' => 'Firstname can\'t be empty!',
                'lastname.required' => 'Lastname can\'t be empty!',
                'address.required' => 'Address can\'t be empty!',
                'phone.required' => 'Phone number can\'t be empty!',
                'phone.numeric' => 'Phone number can only contain number 0-9!',
                'age.required' => 'Age can\'t be empty!',
                'age.numeric' => 'Age must be numeric!',
                'gender.not_in' => 'Gender can\'t be empty!',
                'role.not_in' => 'Role can\'t be empty!'
            ]
        );

        if ($request->role == 'patient'){
            Patient::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'address' => $request->address,
                'phone' => $request->phone,
                'age' => $request->age,
                'gender' => $request->gender,
                'admin_id' => null
            ]);
        }
        else if ($request->role == 'doctor'){
            Doctor::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'address' => $request->address,
                'phone' => $request->phone,
                'age' => $request->age,
                'gender' => $request->gender,
                'admin_id' => null
            ]);
        }

        $creds = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($creds)) {
            $request->session()->regenerate();
        }
        else if (Auth::guard('doctors')->attempt($creds)) {
            $request->session()->regenerate();
        }
        else if (Auth::guard('admins')->attempt($creds)) {
            $request->session()->regenerate();
        }

        return redirect()->intended('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}