<?php
namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Event;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function createForm(Event $event)
    {
        return view('budgets_create', compact('event'));
    }

    public function create(Request $request, Event $event)
    {
        // Validate the request data
        $request->validate([
            'budget_name' => 'required',
            'budget_amount' => 'required|numeric',
        ]);
    
        // Create a new budget for the event
        $budget = Budget::create([
            'event_id' => $event->id,
            'name' => 'Budget', // Provide a default value or fetch from the request
            'description' => $request->input('budget_description'),
            'amount' => $request->input('budget_amount'),
        ]);
    
        // Redirect back to the event show page
        return redirect()->route('events.show', $event->id);
    }

    public function update(Request $request, Event $event, Budget $budget)
    {
        // Validate the request data
        $request->validate([
            'budget_name' => 'required',
            'budget_amount' => 'required|numeric',
        ]);

        // Update the budget details
        $budget->name = $request->input('budget_name');
        $budget->amount = $request->input('budget_amount');
        $budget->save();

        // Return a response or redirect to the event details page
    }

    public function delete(Event $event, Budget $budget)
    {
        // Delete the budget
        $budget->delete();

        // Return a response or redirect to a different page
    }
}
