@extends('layouts.app')

@section('content')
    <h1>Welcome to Event Planner</h1>
    <p>This is the home page of the Event Planner application.</p>
    <p>Start by navigating to the <a href="{{ route('events.index') }}">Events</a> page.</p>
@endsection