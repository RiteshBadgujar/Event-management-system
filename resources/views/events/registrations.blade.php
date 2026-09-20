@extends('layouts.app')

@section('title', 'Event Registrations')

@section('content')

    <h2>Event Registrations</h2>

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
            <strong>Registered:</strong>
            {{ $registrations->count() }}
            /
            {{ $event->max_attendees }}
        </p>

    </div>


    <hr>


    @if($registrations->count() > 0)

        @foreach($registrations as $registration)

            <div class="event-card">

                <h3>
                    {{ $registration->attendee_name }}
                </h3>

                <p>
                    <strong>Email:</strong>
                    {{ $registration->attendee_email }}
                </p>

                <p>
                    <strong>Registered At:</strong>
                    {{ $registration->created_at }}
                </p>


                <!-- View Ticket -->

                <a href="/registrations/{{ $registration->id }}/ticket">
                    View Ticket
                </a>

                &nbsp; | &nbsp;


                <!-- Cancel Registration -->

                <form
                    method="POST"
                    action="/registrations/{{ $registration->id }}"
                    style="display: inline;"
                >

                    @csrf

                    @method('DELETE')

                    <button type="submit">
                        Cancel Registration
                    </button>

                </form>

            </div>

        @endforeach

    @else

        <p>
            No registrations yet.
        </p>

    @endif


    <br>

    <a href="/events">
        Back to Events
    </a>

@endsection