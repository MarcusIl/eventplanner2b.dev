@extends('layouts.app')

@section('content')
    <h1>My Invitations</h1>

    @if ($invitations->isEmpty())
        <p>You have no invitations at the moment.</p>
    @else
        <ul>
            @foreach ($invitations as $invitation)
                <li>
                    <p><strong>Event Name:</strong> {{ $invitation->event->name }}</p>
                    <p><strong>Event Date:</strong> {{ $invitation->event->date }}</p>
                    <p><strong>Event Location:</strong> {{ $invitation->event->location }}</p>
                    <p><strong>Event Description:</strong> {{ $invitation->event->description }}</p>
                    <p><strong>Invited By:</strong> {{ $invitation->event->organizer->name }}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
