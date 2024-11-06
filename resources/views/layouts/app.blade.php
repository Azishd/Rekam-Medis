<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="{{ asset('img/healthconnect_logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Health Connect</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-gray-100">
    @if(Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register')
        @include('layouts.navbar')
    @endif
    @yield('content')
</body>

</html>