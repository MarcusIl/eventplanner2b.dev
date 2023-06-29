@extends('layouts.app')

@section('content')
    <h1>Event Invitation</h1>
    <p>You have been invited to the event: {{ $event->name }}</p>
    <p><strong>Event Date:</strong> {{ $event->date }}</p>
    <p><strong>Event Location:</strong> {{ $event->location }}</p>
    <p><strong>Event Description:</strong> {{ $event->description }}</p>

    <form action="{{ route('events.sendInvitation', $event->id) }}" method="POST">
        @csrf
        <label for="email">Your Email:</label>
        <input type="email" name="email" id="email" required>
        <button type="submit" class="btn btn-primary">Send Invitation</button>
    </form>
@endsection
