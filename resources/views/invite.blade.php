@extends('layouts.app')

@section('content')
    <h1>Event Invitation</h1>
    <p><strong>Event Name:</strong> {{ $event->name }}</p>
    <p><strong>Event Date:</strong> {{ $event->date }}</p>
    <p><strong>Event Location:</strong> {{ $event->location }}</p>
    <p><strong>Event Description:</strong> {{ $event->description }}</p>
    <p><strong>Invited By:</strong> {{ $event->organizer->name }}</p>
@endsection
