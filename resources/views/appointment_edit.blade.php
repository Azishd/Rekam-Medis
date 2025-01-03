<!-- resources/views/appointment_edit.blade.php -->
<form action="{{ route('appointments.update', ['id' => $appointment['id']]) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="patient_name">Patient Name:</label>
    <input type="text" id="patient_name" name="patient_name" value="{{ $appointment['patientName'] }}" required>

    <label for="appointment_date">Appointment Date:</label>
    <input type="datetime-local" id="appointment_date" name="appointment_date" value="{{ $appointment['appointmentDate'] }}" required>

    <label for="doctor_name">Doctor Name:</label>
    <input type="text" id="doctor_name" name="doctor_name" value="{{ $appointment['doctorName'] }}" required>

    <button type="submit">Update Appointment</button>
</form>
