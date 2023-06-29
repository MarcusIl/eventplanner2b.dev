@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Event Invitation</h1>
        <p>You have been invited to the event: {{ $event->name }}</p>
        <p>Event Date: {{ $event->date }}</p>
        <p>Location: {{ $event->location }}</p>
        <p>Description: {{ $event->description }}</p>

        <p>Invitation sent successfully.</p>
    </div>
@endsection
