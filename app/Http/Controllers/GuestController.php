<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Event;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    
    public function create(Request $request, Event $event)
    {
        // Validate the request data
        $request->validate([
            'guest_name' => 'required',
            'guest_email' => 'required|email',
        ]);

        // Create a new guest for the event
        $guest = Guest::create([
            'event_id' => $event->id,
            'guest_name' => $request->input('guest_name'),
            'guest_email' => $request->input('guest_email'),
        ]);

        // Return a response or redirect to the event details page
    }

    public function update(Request $request, Event $event, Guest $guest)
    {
        // Validate the request data
        $request->validate([
            'guest_name' => 'required',
            'guest_email' => 'required|email',
        ]);

        // Update the guest details
        $guest->update([
            'guest_name' => $request->input('guest_name'),
            'guest_email' => $request->input('guest_email'),
        ]);

        // Return a response or redirect to the event details page
    }

    public function delete(Event $event, Guest $guest)
    {
        // Delete the guest
        $guest->delete();

        // Return a response or redirect to a different page
    }
}
