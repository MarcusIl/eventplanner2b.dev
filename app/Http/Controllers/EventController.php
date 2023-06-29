<?php
namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    public function index()
    {
        // Only Admin and Organizer can view the events
        if (Gate::allows('view-events')) {
            // Retrieve all events
            $events = Event::all();
            return view('events', compact('events'));
        } else {
            // Unauthorized access
            abort(403, 'Unauthorized');
        }
    }

    public function create(Request $request)
    {
        // Only Admin and Organizer can create events
        if (Gate::allows('create-events')) {
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

            // Return a response or redirect to the event details page
        } else {
            // Unauthorized access
            abort(403, 'Unauthorized');
        }
    }

    public function show(Event $event)
    {
        // Only Admin and Organizer can view event details
        if (Gate::allows('view-event', $event)) {
            // Fetch the event details from the database
            $event = Event::findOrFail($event->id);

            // Return a response or render a view with the event details
        } else {
            // Unauthorized access
            abort(403, 'Unauthorized');
        }
    }

    public function update(Request $request, Event $event)
    {
        // Only Admin and Organizer can update events
        if (Gate::allows('update-event', $event)) {
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
        } else {
            // Unauthorized access
            abort(403, 'Unauthorized');
        }
    }

    public function delete(Event $event)
    {
        // Only Admin can delete events
        if (Gate::allows('delete-event', $event)) {
            // Delete the event
            $event->delete();

            // Return a response or redirect to a different page
        } else {
            // Unauthorized access
            abort(403, 'Unauthorized');
        }
    }
}

