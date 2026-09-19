<!DOCTYPE html>
<html>
<head>
    <title>Create Event</title>
</head>
<body>

    <h1>Create Event</h1>

    <form method="POST" action="/events">

        @csrf

        <label>Event Name:</label>
        <input type="text" name="name" required>

        <br><br>

        <label>Date:</label>
        <input type="date" name="date" required>

        <br><br>

        <label>Venue:</label>
        <input type="text" name="venue" required>

        <br><br>

        <label>Maximum Attendees:</label>
        <input type="number" name="max_attendees" required>

        <br><br>

        <label>Ticket Price:</label>
        <input type="number" name="ticket_price" step="0.01" required>

        <br><br>

        <button type="submit">Create Event</button>

    </form>

</body>
</html>