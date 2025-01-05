<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slot Status</title>
</head>
<body>
    <h1>Check Slot Status</h1>

    <form action="{{ route('check.slot.status', ['slotId' => '12345']) }}" method="get">
        <label for="slotId">Enter Slot ID:</label>
        <input type="text" id="slotId" name="slotId">
        <button type="submit">Check Status</button>
    </form>

    @if (isset($slotStatus))
        <h3>Slot Status: {{ $slotStatus }}</h3>
        <p>Status: {{ $slotStatus === 'free' ? 'Available for booking' : 'Not available' }}</p>
    @endif
</body>
</html>
