<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        if (Auth::guard('web')->check()) {
            $appointments = Appointment::whereHas('patients', function ($query) {
                $query->where('patient_id', Auth::user()->id);
            })->paginate(10);
        }
        else if (Auth::guard('doctors')->check()) {
            $appointments = Appointment::whereHas('doctors', function ($query) {
                $query->where('doctor_id', Auth::guard('doctors')->user()->id);
            })->paginate(10);
        }
        else if (Auth::guard('admins')->check()) {
            $appointments = Appointment::paginate(10);
        }

        return view('appointment.index', compact('appointments'));
    }

    public function verify(Request $request)
    {
        if ($request->submit_button === 'accept') {
            Appointment::findOrFail($request->id)->update([
                'status' => 'accepted'
            ]);
        } 
        elseif ($request->submit_button === 'reject') {
            Appointment::findOrFail($request->id)->update([
                'status' => 'rejected'
            ]);
        } 

        return redirect('appointment');
    }
}
