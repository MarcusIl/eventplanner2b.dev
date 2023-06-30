<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function deleteUser(User $user)
    {
        // Retrieve the associated invitations
        $invitations = Invitation::whereIn('event_id', function ($query) use ($user) {
            $query->select('id')
                ->from('events')
                ->where('organizer_id', $user->id);
        })->get();
    
        // Delete the associated invitations
        foreach ($invitations as $invitation) {
            $invitation->delete();
        }
    
        // Retrieve events where the user is the organizer
        $events = Event::where('organizer_id', $user->id)->get();
    
        // Delete the events
        foreach ($events as $event) {
            $event->delete();
        }
    
        // Delete the user
        $user->delete();
    
        // Redirect back to the dashboard
        return redirect()->route('admin.dashboard');
    }
    
    

    public function deleteEvent(Event $event)
    {
        // Delete the associated invitations first
        $event->invitations()->delete();
    
        // Perform deletion logic for the event
        $event->delete();
    
        // Redirect back to the dashboard
        return redirect()->route('admin.dashboard');
    }
    

    public function dashboard()
    {
        // Add your logic for the admin dashboard here

        // For example, retrieve all users and events
        $users = User::all();
        $events = Event::all();

        // Pass the data to the admin dashboard view
        return view('admin_dashboard', compact('users', 'events'));
    }
}
