<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
</head>
<body>

    <h1>Edit Event</h1>

    <form method="POST" action="/events/{{ $event->id }}">

        @csrf
        @method('PUT')

        <label>Event Name:</label>
        <input
            type="text"
            name="name"
            value="{{ old('name', $event->name) }}"
            required
        >

        <br><br>

        <label>Date:</label>
        <input
            type="date"
            name="date"
            value="{{ old('date', $event->date) }}"
            required
        >

        <br><br>

        <label>Venue:</label>
        <input
            type="text"
            name="venue"
            value="{{ old('venue', $event->venue) }}"
            required
        >

        <br><br>

        <label>Maximum Attendees:</label>
        <input
            type="number"
            name="max_attendees"
            value="{{ old('max_attendees', $event->max_attendees) }}"
            min="1"
            required
        >

        <br><br>

        <label>Ticket Price:</label>
        <input
            type="number"
            name="ticket_price"
            value="{{ old('ticket_price', $event->ticket_price) }}"
            min="0"
            step="0.01"
            required
        >

        <br><br>

        <button type="submit">Update Event</button>

    </form>

    <br>

    <a href="/events">Back to Events</a>

</body>
</html>