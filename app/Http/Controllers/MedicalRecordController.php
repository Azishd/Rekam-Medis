<?php 

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'patient') {
            $records = MedicalRecord::where('patient_id', $user->id)->get();
        } else {
            $records = MedicalRecord::all();
        }

        return view('medical-records.index', compact('records'));
    }

    public function create()
    {
        return view('medical-records.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'doctor' => 'required|string',
            'diagnosis' => 'required|string',
            'prescription' => 'required|string',
        ]);

        MedicalRecord::create($request->all());

        return redirect()->route('medical-records.index')->with('success', 'Record added successfully.');
    }

    public function show($id)
    {
        $record = MedicalRecord::findOrFail($id);
        $this->authorize('view', $record);

        return view('medical-records.show', compact('record'));
    }

    public function edit($id)
    {
        $record = MedicalRecord::findOrFail($id);
        $this->authorize('update', $record);

        return view('medical-records.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $record = MedicalRecord::findOrFail($id);
        $this->authorize('update', $record);

        $record->update($request->all());

        return redirect()->route('medical-records.index')->with('success', 'Record updated successfully.');
    }

    public function destroy($id)
    {
        $record = MedicalRecord::findOrFail($id);
        $this->authorize('delete', $record);

        $record->delete();

        return redirect()->route('medical-records.index')->with('success', 'Record deleted successfully.');
    }
}
