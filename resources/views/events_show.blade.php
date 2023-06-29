@extends('layouts.app')

@section('content')
    <h1>Event Details</h1>
    <p><strong>Event Name:</strong> {{ $event->name }}</p>
    <p><strong>Event Date:</strong> {{ $event->date }}</p>
    <p><strong>Event Location:</strong> {{ $event->location }}</p>
    <p><strong>Event Description:</strong> {{ $event->description }}</p>

    @if ($event->organizer)
        <p><strong>Organizer:</strong> {{ $event->organizer->name }}</p>
    @endif

    <!-- Button to invite guests -->
    @if (auth()->check() && $event->organizer_id == auth()->user()->id)
        <form action="{{ route('events.invite', $event->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Invite Guests</button>
        </form>
    @endif

    <!-- Button to create tasks -->
    @if (auth()->check() && $event->organizer_id == auth()->user()->id)
    <a href="{{ route('tasks.create', $event->id) }}" class="btn btn-primary">Create Task</a>
    @if (auth()->check() && $event->organizer_id == auth()->user()->id)
        
        <form action="{{ route('events.invite', $event->id) }}" method="POST">
            @csrf
            <label for="name">Guest Name:</label>
            <input type="text" name="name" id="name" required>
            <button type="submit" class="btn btn-primary">Invite Guests</button>
        </form>

        <!-- Display the delete button if the user is the organizer -->
        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Event</button>
        </form>
    @endif
@endsection
