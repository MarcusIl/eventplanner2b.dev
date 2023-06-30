<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Invitation;
use App\Mail\EventInvitation;
use Illuminate\Support\Facades\Session;
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

        // Render the invitation view with the event details
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

    // Find the user with the matching email
    $user = User::where('email', $request->input('email'))->first();

    if (!$user) {
        // User not found, handle the error accordingly
        return redirect()->back()->with('error', 'User with the provided email not found.');
    }

    // Create a new invitation and set the event_id and user_id
    $invitation = new Invitation();
    $invitation->event_id = $event->id;
    $invitation->user_id = $user->id; // Set the user_id based on the matched user
    $invitation->status = 'pending';
    $invitation->save();

    // Redirect back or show a success message
    return redirect()->back()->with('success', 'Invitation sent successfully');
}

    public function respondInvitation(Request $request, Invitation $invitation)
    {
        // Validate the request data
        $request->validate([
            'response' => 'required|in:accepted,rejected',
        ]);

        // Update the invitation status based on the user's response
        $invitation->status = $request->input('response');
        $invitation->save();

        // Redirect back or show a success message
        return redirect()->back()->with('success', 'Invitation response recorded successfully');
    }

    public function invitations()
    {
        // Retrieve the invitations for the authenticated user
        $invitations = auth()->user()->invitations;

        // Render the invitations view with the invitation data
        return view('invitations', compact('invitations'));
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

    // ...

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
