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
            'event_name' => 'required',
            'event_date' => 'required|date',
            'event_location' => 'required',
            'event_description' => 'required',
        ]);
    
        // Create a new event
        $event = Event::create([
            'event_name' => $request->input('event_name'),
            'event_date' => $request->input('event_date'),
            'event_location' => $request->input('event_location'),
            'event_description' => $request->input('event_description'),
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

    public function store(Request $request)
    {
    // Validate the request data
    $request->validate([
        'event_name' => 'required',
        'event_date' => 'required|date',
        'event_location' => 'required',
        'event_description' => 'required',
    ]);

    // Create a new event
    $event = Event::create([
        'event_name' => $request->input('event_name'),
        'event_date' => $request->input('event_date'),
        'event_location' => $request->input('event_location'),
        'event_description' => $request->input('event_description'),
    ]);

    // Redirect to the event details page or show a success message
    return Redirect::route('events.show', $event->id)->with('success', 'Event created successfully');
    }


    public function update(Request $request, Event $event)
    {
        // Validate the request data
        $request->validate([
            'event_name' => 'required',
            'event_date' => 'required|date',
            'event_location' => 'required',
            'event_description' => 'required',
        ]);

        // Update the event details
        $event->update([
            'event_name' => $request->input('event_name'),
            'event_date' => $request->input('event_date'),
            'event_location' => $request->input('event_location'),
            'event_description' => $request->input('event_description'),
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
