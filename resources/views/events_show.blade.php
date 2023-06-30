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
    <p><strong>Guest list:</strong><p>
    @foreach ($event->guests as $guest)
    <p>{{ $guest->name }}</p>
    @endforeach


    <!-- Button to create tasks -->
    @if (auth()->check() && $event->organizer_id == auth()->user()->id)
        <form action="{{ route('tasks.create', $event->id) }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    @endif

    <!-- Button to create budget -->
    <form action="{{ route('budgets.create', $event->id) }}" method="POST">
        @csrf
        <!-- Add your form fields here -->
        <button type="submit" class="btn btn-primary">Create Budget</button>
    </form>

    <!-- Form to invite guests -->
    @if (auth()->check() && $event->organizer_id == auth()->user()->id)
        <form action="{{ route('events.invite', $event->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Invite Guests</button>
        </form>
    @endif

    <!-- Display the delete button if the user is the organizer -->
    @if (auth()->check() && $event->organizer_id == auth()->user()->id)
        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Event</button>
        </form>
    @endif
@endsection
