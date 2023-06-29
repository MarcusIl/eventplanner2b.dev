@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Invite Guests</div>

                    <div class="card-body">
                        <form action="{{ route('invitations.send', $event->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <!-- Add more input fields for additional guest information if needed -->

                            <button type="submit" class="btn btn-primary">Send Invitation</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
