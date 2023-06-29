@extends('layouts.app')

@section('content')
    <h1>Pick an event you like</h1>
    @if (count($events) == 0)
        <p class='error'>There are no records in the database!</p>
    @else
        <ul>
            @foreach ($events as $event)
                <li>
                    <a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('events.create') }}" class="btn btn-primary">Create Event</a>
@endsection
