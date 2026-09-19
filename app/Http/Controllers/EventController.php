<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Display upcoming and past events
    public function index()
    {
        $upcomingEvents = Event::whereDate('date', '>=', today())
            ->orderBy('date', 'asc')
            ->get();

        $pastEvents = Event::whereDate('date', '<', today())
            ->orderBy('date', 'desc')
            ->get();

        return view('events.index', compact('upcomingEvents', 'pastEvents'));
    }

    // Show create event form
    public function create()
    {
        return view('events.create');
    }

    // Store new event
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'date' => 'required|date',
            'venue' => 'required|string|max:150',
            'max_attendees' => 'required|integer|min:1',
            'ticket_price' => 'required|numeric|min:0',
        ]);

        Event::create([
            'name' => $request->name,
            'date' => $request->date,
            'venue' => $request->venue,
            'max_attendees' => $request->max_attendees,
            'ticket_price' => $request->ticket_price,
        ]);

        return redirect('/events')
            ->with('success', 'Event created successfully.');
    }

    // Show edit event form
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', compact('event'));
    }
    // Update event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'date' => 'required|date',
            'venue' => 'required|string|max:150',
            'max_attendees' => 'required|integer|min:1',
            'ticket_price' => 'required|numeric|min:0',
        ]);

        $event->update([
            'name' => $request->name,
            'date' => $request->date,
            'venue' => $request->venue,
            'max_attendees' => $request->max_attendees,
            'ticket_price' => $request->ticket_price,
        ]);

        return redirect('/events')
            ->with('success', 'Event updated successfully.');
    }

    // Register attendee
    public function register(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        // Check event capacity
        if ($event->registrations()->count() >= $event->max_attendees) {
            return back()->with('error', 'Event is full.');
        }

        // Validate attendee details
        $request->validate([
            'attendee_name' => 'required|string|max:100',
            'attendee_email' => 'required|email|max:150',
        ]);

        // Check duplicate registration
        $alreadyRegistered = Registration::where('event_id', $event->id)
            ->where('attendee_email', $request->attendee_email)
            ->exists();

        if ($alreadyRegistered) {
            return back()->with(
                'error',
                'You are already registered for this event.'
            );
        }

        // Create registration
        Registration::create([
            'event_id' => $event->id,
            'attendee_name' => $request->attendee_name,
            'attendee_email' => $request->attendee_email,
        ]);

        return back()->with(
            'success',
            'Registration successful.'
        );
    }
    // Delete event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect('/events')
            ->with('success', 'Event deleted successfully.');
    }
}