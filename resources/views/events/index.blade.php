<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
</head>
<body>

    <h1>Event Management System</h1>

    <a href="/events/create">Create Event</a>

    <h2>Upcoming Events</h2>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif


    @if($upcomingEvents->count() > 0)

        @foreach($upcomingEvents as $event)

            <div>

                <h3>{{ $event->name }}</h3>

                <p>
                    Date: {{ $event->date }}
                </p>

                <p>
                    Venue: {{ $event->venue }}
                </p>

                <p>
                    Maximum Attendees:
                    {{ $event->max_attendees }}
                </p>

                <p>
                    Registered:
                    {{ $event->registrations()->count() }}
                </p>

                <p>
                    Available Seats:
                    {{ $event->max_attendees - $event->registrations()->count() }}
                </p>

                <p>
                    Ticket Price: ₹{{ $event->ticket_price }}
                </p>


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

                    <p>Event is Full</p>

                @endif


                <br>

                <!-- Edit Event -->
                <a href="/events/{{ $event->id }}/edit">
                    Edit
                </a>


                <!-- Delete Event -->
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

            <hr>

        @endforeach

    @else

        <p>No upcoming events.</p>

    @endif



    <h2>Past Events</h2>


    @if($pastEvents->count() > 0)

        @foreach($pastEvents as $event)

            <div>

                <h3>{{ $event->name }}</h3>

                <p>
                    Date: {{ $event->date }}
                </p>

                <p>
                    Venue: {{ $event->venue }}
                </p>

                <p>
                    Ticket Price: ₹{{ $event->ticket_price }}
                </p>


                <!-- Edit Event -->
                <a href="/events/{{ $event->id }}/edit">
                    Edit
                </a>


                <!-- Delete Event -->
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

            <hr>

        @endforeach

    @else

        <p>No past events.</p>

    @endif

</body>
</html>