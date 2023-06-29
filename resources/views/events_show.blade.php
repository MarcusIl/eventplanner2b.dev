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
    @if (auth()->check() && $event->organizer_id == auth()->user()->id)
    <form action="{{ route('events.invite', $event->id) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Invite Guests</button>
    </form>
@endif
</body>

    @if ($event)
        <p><strong>Event Name:</strong> {{ $event->name }}</p>
        <p><strong>Event Description:</strong> {{ $event->description }}</p>
        <p><strong>Event Organizer:</strong>
            @if ($event->organizer)
                {{ $event->organizer->name }}
            @else
                Unknown Organizer
            @endif
        </p>

        <!-- Display the delete button if the user is the organizer -->
        @if (auth()->check() && $event->organizer_id == auth()->user()->id)
            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Event</button>
            </form>
        @endif
    @else
        <p class="error">Event not found.</p>
    @endif
@endsection
