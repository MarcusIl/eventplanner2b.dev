<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSVP Management</title>
</head>
<body>
    <h1>RSVP Management</h1>
    <form action="{{ route('guests.update', $guest->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $guest->name }}">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $guest->email }}">
        </div>
        <div>
            <label for="rsvp">RSVP</label>
            <select name="rsvp">
                <option value="0"{{ $guest->rsvp == 0 ? ' selected' : '' }}>No</option>
                <option value="1"{{ $guest->rsvp == 1 ? ' selected' : '' }}>Yes</option>
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
