<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Event;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request, Event $event)
    {
        // Validate the request data
        $request->validate([
            'task_name' => 'required',
            'task_description' => 'required',
        ]);

        // Create a new task for the event
        $task = Task::create([
            'event_id' => $event->id,
            'task_name' => $request->input('task_name'),
            'task_description' => $request->input('task_description'),
        ]);

        // Return a response or redirect to the event details page
    }

    public function update(Request $request, Event $event, Task $task)
    {
        // Validate the request data
        $request->validate([
            'task_name' => 'required',
            'task_description' => 'required',
        ]);

        // Update the task details
        $task->update([
            'task_name' => $request->input('task_name'),
            'task_description' => $request->input('task_description'),
        ]);

        // Return a response or redirect to the event details page
    }

    public function delete(Event $event, Task $task)
    {
        // Delete the task
        $task->delete();

        // Return a response or redirect to a different page
    }
}
