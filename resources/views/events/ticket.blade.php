@extends('layouts.app')

@section('title', 'Event Ticket')

@section('content')

    <h2>Event Ticket</h2>

    <div class="event-card">

        <h2>
            {{ $registration->event->name }}
        </h2>


        <p>
            <strong>Ticket ID:</strong>
            #{{ $registration->id }}
        </p>


        <p>
            <strong>Attendee Name:</strong>
            {{ $registration->attendee_name }}
        </p>


        <p>
            <strong>Email:</strong>
            {{ $registration->attendee_email }}
        </p>


        <p>
            <strong>Event Date:</strong>
            {{ $registration->event->date }}
        </p>


        <p>
            <strong>Venue:</strong>
            {{ $registration->event->venue }}
        </p>


        <p>
            <strong>Ticket Price:</strong>
            ₹{{ $registration->event->ticket_price }}
        </p>


        <p>
            <strong>Registration Date:</strong>
            {{ $registration->created_at }}
        </p>

    </div>


    <hr>


    <h3>
        Registration Confirmed
    </h3>


    <br>


    <a href="/events">
        Back to Events
    </a>

@endsection