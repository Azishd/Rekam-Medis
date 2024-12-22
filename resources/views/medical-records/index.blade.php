@extends('layouts.app')

@section('content')
<h1>Medical Records</h1>
<a href="{{ route('medical-records.create') }}">Add New Record</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Diagnosis</th>
            <th>Prescription</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($records as $record)
        <tr>
            <td>{{ $record->id }}</td>
            <td>{{ $record->patient->name }}</td>
            <td>{{ $record->doctor }}</td>
            <td>{{ $record->diagnosis }}</td>
            <td>{{ $record->prescription }}</td>
            <td>
                <a href="{{ route('medical-records.show', $record->id) }}">View</a>
                <a href="{{ route('medical-records.edit', $record->id) }}">Edit</a>
                <form action="{{ route('medical-records.destroy', $record->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
