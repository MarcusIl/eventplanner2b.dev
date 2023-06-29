<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
</head>
<body>
    <h1>Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div>
            <label for="event_name">Event Name</label>
            <input type="text" name="event_name">
        </div>
        <div>
            <label for="event_date">Event Date</label>
            <input type="date" name="event_date">
        </div>
        <div>
            <label for="event_location">Event Location</label>
            <input type="text" name="event_location">
        </div>
        <div>
            <label for="event_description">Event Description</label>
            <textarea name="event_description"></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
</body>
</html>
