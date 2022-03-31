<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leave Management</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link href="{{ asset('/css/welcome.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="">

    <div class="button-spacing">
        @if (Route::has('login'))
        @auth
        <a href="{{ url('/dashboard') }}" class="button">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="button">Log in</a>
        @if (Route::has('register'))
        <div class="links">
            <h3 class="">Link for Hod registration</h3>
            <a href="{{ url('/HodRegistration') }}" class="button_hod a_links">Register</a>
            <h3>Link for Staff registration</h3>
            <a href="{{ url('/StaffRegistration') }}" class="a_links button_staff">Register</a>
        </div>

        @endif
        @endauth
        @endif
    </div>

</body>

</html>