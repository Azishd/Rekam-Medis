<!-- resources/views/appointment_create.blade.php -->
<form action="{{ route('appointments.store') }}" method="POST">
    @csrf
    <label for="patient_name">Patient Name:</label>
    <input type="text" id="patient_name" name="patient_name" required>

    <label for="appointment_date">Appointment Date:</label>
    <input type="datetime-local" id="appointment_date" name="appointment_date" required>

    <label for="doctor_name">Doctor Name:</label>
    <input type="text" id="doctor_name" name="doctor_name" required>

    <button type="submit">Create Appointment</button>
</form>
