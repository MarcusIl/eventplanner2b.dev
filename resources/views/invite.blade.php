@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Event Invitation</h1>
        <p>Event Date: {{ $event->date }}</p>
        <p>Location: {{ $event->location }}</p>
        <p>Description: {{ $event->description }}</p>

        <p>Invitation sent successfully.</p>
    </div>
@endsection
