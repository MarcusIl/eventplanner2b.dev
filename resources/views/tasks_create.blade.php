@extends('layouts.app')

@section('content')
    <h1>Create Task</h1>

    <form action="{{ route('tasks.create', $event->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="task_name">Task Name</label>
            <br>
            <input type="text" name="task_name" id="task_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="task_description">Task Description</label>
            <br>
            <textarea name="task_description" id="task_description" class="form-control" rows="5" required></textarea>
        </div>

<!-- Task Assignee -->
<div class="form-group">
    <label for="assignee">Assignee</label>
    <select name="user_id" id="assignee" class="form-control">
        <option value="{{ $event->organizer->id }}">{{ $event->organizer->name }} (Organizer)</option>
        @foreach ($event->invitations as $invitation)
            <option value="{{ $invitation->user->id }}">{{ $invitation->user->name }}</option>
        @endforeach
    </select>
</div>



        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
@endsection
