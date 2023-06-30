@extends('layouts.app')

@section('content')
    <h1>Event Details</h1>
    <p><strong>Event Name:</strong> {{ $event->name }}</p>
    <p><strong>Event Date:</strong> {{ $event->date }}</p>
    <p><strong>Event Location:</strong> {{ $event->location }}</p>
    <p><strong>Event Description:</strong> {{ $event->description }}</p>

    @if ($event->organizer)
        <p><strong>Organizer:</strong> {{ $event->organizer->name }}</p>
    @endif
    <p><strong>Guest List:</strong></p>
    @if ($event->guests->isEmpty())
        <p>No guests found.</p>
    @else
        <ul>
            @foreach ($event->guests as $guest)
                <li>{{ $guest->name }}</li>
            @endforeach
        </ul>
    @endif

    <!-- Button to create tasks -->
    @if (auth()->check() && $event->organizer_id == auth()->user()->id)
        <form action="{{ route('tasks.create', $event->id) }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    @endif

    <!-- Button to create budget -->
    @if (auth()->check() && $event->organizer_id == auth()->user()->id)
        <form action="{{ route('budgets.create', $event->id) }}" method="GET">
            @csrf
            <!-- Add your form fields here -->
            <button type="submit" class="btn btn-primary">Create Budget</button>
        </form>
    @endif

    <!-- Form to invite guests -->
    @if (auth()->check() && $event->organizer_id == auth()->user()->id)
        <form action="{{ route('events.invite', $event->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Invite Guests</button>
        </form>
    @endif

    <!-- Display the delete button if the user is the organizer -->
    @if (auth()->check() && $event->organizer_id == auth()->user()->id)
        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Event</button>
        </form>
    @endif

<!-- Display tasks -->
<h2>Tasks</h2>
@if ($event->tasks->count() > 0)
    <ul>
        @foreach ($event->tasks as $task)
            <li>
                <strong>Task Name:</strong> {{ $task->name }}
                <br>
                <strong>Task Description:</strong> {{ $task->description }}
                <br>
                <strong>Status:</strong> {{ $task->status }}
                <br>
                <strong>Assigned To:</strong> {{ $task->user->name }}
                @if (auth()->check() && $event->organizer_id == auth()->user()->id)
                    @if ($task->status !== 'finished')
                        <!-- Checkbox to mark task as finished -->
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label>
                                <input type="checkbox" name="status" value="finished" onchange="this.form.submit()">
                                Mark as finished
                            </label>
                        </form>
                    @endif
                @endif
            </li>
        @endforeach
    </ul>
@else
    <p>No tasks available.</p>
@endif




    <!-- Display budgets -->
    <h2>Budgets</h2>
    @if ($event->budgets->count() > 0)
        <ul>
            @foreach ($event->budgets as $budget)
                <li>{{ $budget->name }} - ${{ $budget->amount }} - {{$budget->description}}</li>
                <!-- Display the delete button if the user is the organizer -->
                @if (auth()->check() && $event->organizer_id == auth()->user()->id)
                    <form action="{{ route('budgets.delete', [$event->id, $budget->id]) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            @endforeach
        </ul>
    @else
        <p>No budgets available.</p>
    @endif

@endsection
