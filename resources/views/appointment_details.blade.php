<!-- resources/views/appointment_details.blade.php -->
<h1>Appointment Details</h1>

<p><strong>Appointment ID:</strong> {{ $appointment['id'] }}</p>
<p><strong>Patient Name:</strong> {{ $appointment['patientName'] }}</p>
<p><strong>Appointment Date:</strong> {{ $appointment['appointmentDate'] }}</p>
<p><strong>Doctor Name:</strong> {{ $appointment['doctorName'] }}</p>

<a href="{{ route('appointments.edit', ['id' => $appointment['id']]) }}">Edit Appointment</a>
