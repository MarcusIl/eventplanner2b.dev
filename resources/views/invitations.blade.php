@extends('layouts.app')

@section('content')
    <h1>My Invitations</h1>

    @if ($invitations->isEmpty())
        <p>No invitations found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invitations as $invitation)
                    <tr>
                        <td>{{ $invitation->event->name }}</td>
                        <td>{{ $invitation->status }}</td>
                        <td>
                            @if ($invitation->status === 'pending')
                                <form action="{{ route('invitations.respond', $invitation->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="response" value="accepted">
                                    <button type="submit">Accept</button>
                                </form>
                                <form action="{{ route('invitations.respond', $invitation->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="response" value="rejected">
                                    <button type="submit">Reject</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
