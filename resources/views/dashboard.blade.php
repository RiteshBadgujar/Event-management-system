@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h2>Event Management Dashboard</h2>

    <br>

    <!-- Statistics -->

    <div class="event-card">

        <h3>Total Events</h3>

        <p>
            {{ $totalEvents }}
        </p>

    </div>


    <div class="event-card">

        <h3>Upcoming Events</h3>

        <p>
            {{ $upcomingEvents }}
        </p>

    </div>


    <div class="event-card">

        <h3>Past Events</h3>

        <p>
            {{ $pastEvents }}
        </p>

    </div>


    <div class="event-card">

        <h3>Total Registrations</h3>

        <p>
            {{ $totalRegistrations }}
        </p>

    </div>


    <div class="event-card">

        <h3>Total Capacity</h3>

        <p>
            {{ $totalCapacity }}
        </p>

    </div>


    <div class="event-card">

        <h3>Total Available Seats</h3>

        <p>
            {{ $totalAvailableSeats }}
        </p>

    </div>


    <hr>


    <!-- Upcoming Events -->

    <h2>Upcoming Events</h2>

    @if($events->count() > 0)

        @foreach($events as $event)

            @php

                $availableSeats =
                    $event->max_attendees
                    - $event->registrations_count;

                $registrationPercentage =
                    $event->max_attendees > 0
                    ? (
                        $event->registrations_count
                        / $event->max_attendees
                    ) * 100
                    : 0;

            @endphp


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
                    <strong>Registered:</strong>
                    {{ $event->registrations_count }}
                    /
                    {{ $event->max_attendees }}
                </p>


                <p>
                    <strong>Available Seats:</strong>
                    {{ $availableSeats }}
                </p>


                <p>
                    <strong>Registration:</strong>
                    {{ number_format($registrationPercentage, 1) }}%
                </p>


                @if($availableSeats == 0)

                    <p>
                        <strong>Capacity Status:</strong>
                        Full
                    </p>

                @elseif($registrationPercentage >= 80)

                    <p>
                        <strong>Capacity Status:</strong>
                        Almost Full
                    </p>

                @else

                    <p>
                        <strong>Capacity Status:</strong>
                        Available
                    </p>

                @endif


                <p>
                    <strong>Ticket Price:</strong>
                    ₹{{ $event->ticket_price }}
                </p>


                <a href="/events/{{ $event->id }}">
                    View Details
                </a>

            </div>

        @endforeach

    @else

        <p>
            No upcoming events.
        </p>

    @endif

@endsection