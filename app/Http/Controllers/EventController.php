<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    public function index()
    {
        // Retrieve all events
        $events = Event::all();
        return view('events', compact('events'));
    }

    public function create(Request $request)
    {
        return view('events_create');
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'description' => 'required',
        ]);
    
        // Create a new event
        $event = Event::create([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
        ]);
    
        // Redirect to the event details page or show a success message
        return Redirect::route('events.show', $event->id)->with('success', 'Event created successfully');
    }
    
    

    public function show(Event $event)
    {
        // Fetch the event details from the database
        $event = Event::findOrFail($event->id);

        // Return a response or render a view with the event details
    }

    use Illuminate\Support\Facades\Auth;

// ...

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'description' => 'required',
        ]);

        // Get the authenticated user's ID
        $organizerId = Auth::id();

        // Create a new event with the organizer_id
        $event = Event::create([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
            'organizer_id' => $organizerId,
        ]);

        // Redirect to the event details page or show a success message
        return Redirect::route('events.show', $event->id)->with('success', 'Event created successfully');
    }



    public function update(Request $request, Event $event)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'location' => 'required',
            'description' => 'required',
        ]);

        // Update the event details
        $event->update([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
        ]);

        // Return a response or redirect to the event details page
    }

    public function delete(Event $event)
    {
        // Delete the event
        $event->delete();

        // Return a response or redirect to a different page
    }
}
