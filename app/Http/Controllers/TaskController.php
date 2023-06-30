<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\User;

class TaskController extends Controller
{

    public function showCreateForm(Event $event)
    {
        if ($event->organizer_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        
        // Retrieve the list of users
        $users = User::all(); // Replace `User` with your actual user model
        
        return view('tasks_create', compact('event', 'users'));
    }
    
    

    public function create(Request $request, Event $event)
    {
        // Validate the request data
        $request->validate([
            'task_name' => 'required',
            'task_description' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
    
        // Get the authenticated user's ID
        $userId = auth()->id();
    
        // Create a new task for the event with the user_id and assigned user
        $task = Task::create([
            'event_id' => $event->id,
            'user_id' => $request->input('user_id'), // Assign the user_id value from the form
            'name' => $request->input('task_name'),
            'description' => $request->input('task_description'),
            'status' => 'pending',
        ]);
    
        // Redirect to the event details page or show a success message
        return redirect()->route('events.show', $event->id)->with('success', 'Task created successfully');
    }
    
    
    
    
    
    

    public function update(Request $request, Task $task)
    {
        // Update the task details
        $task->update([
            'status' => $request->input('status'),
        ]);
    
        // Redirect back or return a response
        return redirect()->back()->with('success', 'Task updated successfully');
    }
    
    
    
    
    

    public function delete(Event $event, Task $task)
    {
        // Delete the task
        $task->delete();

        // Return a response or redirect to a different page
    }
}
