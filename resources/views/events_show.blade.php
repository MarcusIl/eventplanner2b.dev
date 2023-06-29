@extends('layouts.app')
<!-- events_show.blade.php -->
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Event Details</title>
</head>

<body>
    <h1>Event Details</h1>
    <p><strong>Event Name:</strong> {{ $event->name }}</p>
    <p><strong>Event Date:</strong> {{ $event->date }}</p>
    <p><strong>Event Location:</strong> {{ $event->location }}</p>
    <p><strong>Event Description:</strong> {{ $event->description }}</p>
    
    @if ($event->organizer)
        <p><strong>Organizer:</strong> {{ $event->organizer->name }}</p>
    @endif
    @if(Auth::user()->id == $event->organizer_id)
    <form action="{{ route('events.invite', $event->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Invite Guests</button>
    </form>
@endif
</body>

</html>
@endsection