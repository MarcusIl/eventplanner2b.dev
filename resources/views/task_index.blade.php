<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
</head>
<body>
    <h1>Task Management</h1>
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task->name }}</li>
        @endforeach
    </ul>
</body>
</html>
