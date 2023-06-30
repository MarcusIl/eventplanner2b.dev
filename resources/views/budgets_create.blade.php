@extends('layouts.app')

@section('content')
    <h1>Create Budget</h1>

    <form action="{{ route('budgets.create', $event->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="budget_name">Budget Name</label>
            <input type="text" name="budget_name" id="budget_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="budget_amount">Budget Amount</label>
            <input type="number" name="budget_amount" id="budget_amount" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="budget_description">Budget Description</label>
            <textarea name="budget_description" id="budget_description" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Budget</button>
    </form>
@endsection
