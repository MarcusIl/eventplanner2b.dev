@extends('layouts.app')

@section('content')
    <h1>Admin Dashboard</h1>

    <h2>Users</h2>
    <ul>
        @foreach($users as $user)
            <li>
                {{ $user->name }}
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <h2>Events</h2>
    <ul>
        @foreach($events as $event)
            <li>
                {{ $event->name }}
                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
