@extends('layouts.app')

@section('title', 'Create Event')

@section('content')

    <h2>Create Event</h2>

    @if($errors->any())

        @foreach($errors->all() as $error)

            <div class="error">
                {{ $error }}
            </div>

        @endforeach

    @endif


    <div class="event-card">

        <form method="POST" action="/events">

            @csrf

            <p>
                <label>
                    Event Name:
                </label>

                <br>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Enter event name"
                    required
                >
            </p>


            <p>
                <label>
                    Date:
                </label>

                <br>

                <input
                    type="date"
                    name="date"
                    value="{{ old('date') }}"
                    required
                >
            </p>


            <p>
                <label>
                    Venue:
                </label>

                <br>

                <input
                    type="text"
                    name="venue"
                    value="{{ old('venue') }}"
                    placeholder="Enter venue"
                    required
                >
            </p>


            <p>
                <label>
                    Maximum Attendees:
                </label>

                <br>

                <input
                    type="number"
                    name="max_attendees"
                    value="{{ old('max_attendees') }}"
                    min="1"
                    placeholder="Enter maximum attendees"
                    required
                >
            </p>


            <p>
                <label>
                    Ticket Price:
                </label>

                <br>

                <input
                    type="number"
                    name="ticket_price"
                    value="{{ old('ticket_price') }}"
                    min="0"
                    step="0.01"
                    placeholder="Enter ticket price"
                    required
                >
            </p>


            <button type="submit">
                Create Event
            </button>

        </form>

    </div>


    <br>

    <a href="/events">
        Back to Events
    </a>

@endsection