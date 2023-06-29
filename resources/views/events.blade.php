@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Events</title>
</head>

<body>
    <h1>Pick an event you like</h1>
    @if (count($events) == 0)
        <p class='error'>There are no records in the database!</p>
    @else
        <ul>
            @foreach ($events as $event)
                <li>
                    {{ $event->name }}
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('events.create') }}" class="btn btn-primary">Create Event</a>
</body>

</html>
@endsection