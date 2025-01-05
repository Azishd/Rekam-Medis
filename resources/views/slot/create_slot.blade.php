<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Slot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Create a New Slot</h2>

    <!-- Display validation errors, if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('store.slot') }}" method="POST">
        @csrf
    
        <!-- Slot ID -->
        <div class="mb-3">
            <label for="slot_id" class="form-label">Slot ID</label>
            <input type="text" class="form-control" id="slot_id" name="slot_id" value="{{ old('slot_id') }}" required>
            @error('slot_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <!-- Start Time -->
        <div class="mb-3">
            <label for="start" class="form-label">Start Time</label>
            <input type="datetime-local" class="form-control" id="start" name="start" value="{{ old('start') }}" required>
            @error('start')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <!-- End Time -->
        <div class="mb-3">
            <label for="end" class="form-label">End Time</label>
            <input type="datetime-local" class="form-control" id="end" name="end" value="{{ old('end') }}" required>
            @error('end')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <!-- Practitioner ID -->
        <div class="mb-3">
            <label for="practitioner_id" class="form-label">Practitioner ID</label>
            <input type="text" class="form-control" id="practitioner_id" name="practitioner_id" value="{{ old('practitioner_id') }}" required>
            @error('practitioner_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <!-- Service Type Code -->
        <div class="mb-3">
            <label for="service_type_code" class="form-label">Service Type Code</label>
            <input type="text" class="form-control" id="service_type_code" name="service_type_code" value="{{ old('service_type_code') }}" required>
            @error('service_type_code')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <!-- Availability -->
        <div class="mb-3">
            <label for="availability" class="form-label">Availability</label>
            <select class="form-control" id="availability" name="availability" required>
                <option value="available" {{ old('availability') == 'available' ? 'selected' : '' }}>Available</option>
                <option value="not_available" {{ old('availability') == 'not_available' ? 'selected' : '' }}>Not Available</option>
            </select>
            @error('availability')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-primary">Create Slot</button>
    </form>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
