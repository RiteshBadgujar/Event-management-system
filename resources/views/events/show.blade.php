@extends('layouts.app')

@section('title', 'Event Details')

@section('content')

    <h2>Event Details</h2>


    @if($errors->any())

        @foreach($errors->all() as $error)

            <div class="error">
                {{ $error }}
            </div>

        @endforeach

    @endif


    <div class="event-card">

        <h2>
            {{ $event->name }}
        </h2>


        <p>
            <strong>Date:</strong>
            {{ $event->date }}
        </p>


        <p>
            <strong>Venue:</strong>
            {{ $event->venue }}
        </p>


        <p>
            <strong>Maximum Attendees:</strong>
            {{ $event->max_attendees }}
        </p>


        <p>
            <strong>Registered:</strong>
            {{ $registeredCount }}
        </p>


        <p>
            <strong>Available Seats:</strong>
            {{ $availableSeats }}
        </p>


        <p>
            <strong>Ticket Price:</strong>
            ₹{{ $event->ticket_price }}
        </p>

    </div>


    <hr>


    @if($availableSeats > 0)

        <h3>Register for this Event</h3>

        <form
            method="POST"
            action="/events/{{ $event->id }}/register"
        >

            @csrf


            <p>

                <label>
                    Attendee Name:
                </label>

                <br>

                <input
                    type="text"
                    name="attendee_name"
                    value="{{ old('attendee_name') }}"
                    placeholder="Enter your name"
                    required
                >

            </p>


            <p>

                <label>
                    Attendee Email:
                </label>

                <br>

                <input
                    type="email"
                    name="attendee_email"
                    value="{{ old('attendee_email') }}"
                    placeholder="Enter your email"
                    required
                >

            </p>


            <button type="submit">
                Register
            </button>

        </form>

    @else

        <p>
            <strong>Event is Full.</strong>
        </p>

    @endif


    <br>

    <a href="/events">
        Back to Events
    </a>

    &nbsp; | &nbsp;


    <a href="/events/{{ $event->id }}/edit">
        Edit Event
    </a>

    &nbsp; | &nbsp;


    <a href="/events/{{ $event->id }}/registrations">
        View Registrations
    </a>

@endsection