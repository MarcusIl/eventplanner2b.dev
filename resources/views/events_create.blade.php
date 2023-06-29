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
            <label for="name">Event Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="date">Event Date</label>
            <input type="date" name="date">
        </div>
        <div>
            <label for="location">Event Location</label>
            <input type="text" name="location">
        </div>
        <div>
            <label for="description">Event Description</label>
            <textarea name="description"></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
</body>
</html>
