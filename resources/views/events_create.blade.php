<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
</head>
<body>
    <h1>Create Event</h1>
    <form action="{{ route('events.create') }}" method="POST">
        @csrf
        <!-- Form fields -->
        <input type="text" name="name" placeholder="Event Name">
        <input type="date" name="date" placeholder="Event Date">
        <input type="text" name="location" placeholder="Event Location">
        <textarea name="description" placeholder="Event Description"></textarea>

        <!-- Submit button -->
        <button type="submit">Create Event</button>
    </form>

</body>
</html>
