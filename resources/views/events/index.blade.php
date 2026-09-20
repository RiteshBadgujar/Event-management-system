@extends('layouts.app')

@section('title', 'Events')

@section('content')

    <h2>Events</h2>

    <a href="/events/create">
        Create Event
    </a>

    <br><br>


    <!-- Search Events -->

    <form method="GET" action="/events/search">

        <input
            type="text"
            name="search"
            placeholder="Search event or venue"
            value="{{ request('search') }}"
        >

        <button type="submit">
            Search
        </button>

    </form>

    <br>


    <!-- Upcoming Events -->

    <h2>Upcoming Events</h2>

    @if($upcomingEvents->count() > 0)

        @foreach($upcomingEvents as $event)

            <div class="event-card">

                <h3>
                    {{ $event->name }}
                </h3>

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
                    {{ $event->registrations()->count() }}
                </p>

                <p>
                    <strong>Available Seats:</strong>
                    {{ $event->max_attendees - $event->registrations()->count() }}
                </p>

                <p>
                    <strong>Ticket Price:</strong>
                    ₹{{ $event->ticket_price }}
                </p>


                <!-- Registration -->

                @if($event->registrations()->count() < $event->max_attendees)

                    <form
                        method="POST"
                        action="/events/{{ $event->id }}/register"
                    >

                        @csrf

                        <input
                            type="text"
                            name="attendee_name"
                            placeholder="Your Name"
                            value="{{ old('attendee_name') }}"
                            required
                        >

                        <input
                            type="email"
                            name="attendee_email"
                            placeholder="Your Email"
                            value="{{ old('attendee_email') }}"
                            required
                        >

                        <button type="submit">
                            Register
                        </button>

                    </form>

                @else

                    <p>
                        <strong>
                            Event is Full
                        </strong>
                    </p>

                @endif


                <br>


                <!-- Event Actions -->

                <a href="/events/{{ $event->id }}">
                    View Details
                </a>

                &nbsp; | &nbsp;

                <a href="/events/{{ $event->id }}/edit">
                    Edit
                </a>

                &nbsp; | &nbsp;

                <a href="/events/{{ $event->id }}/registrations">
                    View Registrations
                </a>

                &nbsp;


                <!-- Delete -->

                <form
                    method="POST"
                    action="/events/{{ $event->id }}"
                    style="display: inline;"
                >

                    @csrf

                    @method('DELETE')

                    <button type="submit">
                        Delete
                    </button>

                </form>

            </div>

        @endforeach

    @else

        <p>
            No upcoming events.
        </p>

    @endif


    <br>


    <!-- Past Events -->

    <h2>Past Events</h2>

    @if($pastEvents->count() > 0)

        @foreach($pastEvents as $event)

            <div class="event-card">

                <h3>
                    {{ $event->name }}
                </h3>

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
                    {{ $event->registrations()->count() }}
                </p>

                <p>
                    <strong>Ticket Price:</strong>
                    ₹{{ $event->ticket_price }}
                </p>


                <!-- Event Actions -->

                <a href="/events/{{ $event->id }}">
                    View Details
                </a>

                &nbsp; | &nbsp;

                <a href="/events/{{ $event->id }}/edit">
                    Edit
                </a>

                &nbsp; | &nbsp;

                <a href="/events/{{ $event->id }}/registrations">
                    View Registrations
                </a>

                &nbsp;


                <!-- Delete -->

                <form
                    method="POST"
                    action="/events/{{ $event->id }}"
                    style="display: inline;"
                >

                    @csrf

                    @method('DELETE')

                    <button type="submit">
                        Delete
                    </button>

                </form>

            </div>

        @endforeach

    @else

        <p>
            No past events.
        </p>

    @endif

@endsection