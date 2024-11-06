<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::paginate(10);
        return view('doctor.index', compact('doctors'));
    }

    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        $patients = Patient::whereHas('assessments', function ($query) use ($id) {
            $query->where('is_finished', 1)
                ->whereHas('doctors', function ($nestedQuery) use ($id) {
                    $nestedQuery->where('doctor_id', $id);
                });
        })->paginate(5);
        return view('doctor.show', compact('doctor', 'patients'));
    }

    public function update(Request $request, $id)
    {
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

        Doctor::findOrFail($id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
            'age' => $request->age,
            'gender' => $request->gender
        ]);

        return redirect('doctor/' . $id);
    }
}
