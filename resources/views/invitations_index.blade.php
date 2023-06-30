@extends('layouts.app')

@section('content')
    <h1>Invitations</h1>

    @if ($invitations->isEmpty())
        <p>No invitations found.</p>
    @else
        <ul>
            @foreach ($invitations as $invitation)
                <li>
                    <p>You have been invited to the event: {{ $invitation->event->name }}</p>
                    <p>Event Date: {{ $invitation->event->date }}</p>
                    <p>Location: {{ $invitation->event->location }}</p>
                    <p>Description: {{ $invitation->event->description }}</p>

                    @if ($invitation->status === 'pending')
                    <a href="{{ route('invitations.respond', ['invitation' => $invitation->id, 'response' => 'accepted']) }}">Accept</a>
<a href="{{ route('invitations.respond', ['invitation' => $invitation->id, 'response' => 'rejected']) }}">Reject</a>

                    @else
                        <p>Status: {{ $invitation->status }}</p>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
@endsection
