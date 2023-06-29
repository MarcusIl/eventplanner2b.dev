<!DOCTYPE html>
<html>
<head>
    <title>Event Invitation</title>
</head>
<body>
    <h1>Event Invitation</h1>
    <p>You are invited to an event: {{ $event->name }}</p>
    <p>Date: {{ $event->date }}</p>
    <p>Location: {{ $event->location }}</p>
    <p>Description: {{ $event->description }}</p>
    <p>Thank you!</p>
</body>
</html>
