<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Mail\EventInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;



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
        return redirect()->route('events.show', $event->id)->with('success', 'Event created successfully');
    }
    
    
    

    // EventController.php

    public function show(Event $event)
    {
        // Fetch the event details from the database
        $event = Event::findOrFail($event->id);
    
        // Fetch the tasks associated with the event
        $tasks = $event->tasks;
    
        // Pass the event and tasks data to the events_show view
        return view('events_show', compact('event', 'tasks'));
    }
    

    public function invite(Event $event)
    {
        // Retrieve the event details
        $event = Event::findOrFail($event->id);

        // Render the invite view with the event details
        return view('invite', compact('event'));
    }

    public function sendInvitation(Request $request, Event $event)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
        ]);

        // Retrieve the event details
        $event = Event::findOrFail($event->id);

        // Send the invitation email
        Mail::to($request->input('email'))->send(new EventInvitation($event));

        // Redirect back or show a success message
        return redirect()->back()->with('success', 'Invitation sent successfully');
    }


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
        return redirect()->route('events.show', $event->id)->with('success', 'Event created successfully');
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

    public function destroy(Event $event)
    {
        // Delete the event
        $event->delete();

        // Redirect to a different page or show a success message
        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::check()) {
                Session::put('previous_url', $request->url());
            }
            return $next($request);
        });
    }
}
