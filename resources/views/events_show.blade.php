@extends('layouts.app')

@section('content')
    <h1>Event Details</h1>

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
