<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    @extends('layouts.master')

    @section('content')
    <div class="bg-container-dashboard">
        <div class="logo text-center">
            <img src="{{ asset('images/logo.png') }}" alt="logo" width="200" class="image-dashboard">
            <h3>Leave Management System</h3>
        </div>
        <div>
            <h4>Hello {{ Auth::user()->name }} You're logged in! as a {{ Auth::user()->roles[0]['display_name']}}</h4>
        </div>
        <div class="text-left">
            <h4>Total leaves Applied<span class="logo">{{ $staffLeaves }}</span></h4>
            <h4>Leaves Accepted <span class="text-success">{{ $accepted }}</span></h4>
            <h4>Leaves Rejected <span class="text-danger">{{ $rejected }}</span></h4>
        </div>

    </div>

    @endsection


</body>

</html