@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Volunteer Profile</title>
        </head>
        <body>
        <h1>Volunteer Profile</h1>
        <p>Name: {{ $volunteer->user->name }}</p>
        <p>Email: {{ $volunteer->user->email }}</p>
        <p>Email: {{ $volunteer->user->phone }}</p>
        <!-- Add more profile details as needed -->
        </body>
        </html>

@endsection
