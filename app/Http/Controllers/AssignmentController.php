<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Payment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $tasks = Task::all();
        $assignments = Assignment::with(['user', 'task'])->get();

        return view('operation.assignment', compact('users', 'tasks', 'assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'users' => 'required|array',
            'users.*' => 'exists:users,id',
        ]);

        foreach ($request->users as $userId) {
            Assignment::create([
                'task_id' => $request->task_id,
                'user_id' => $userId,
                'status' => 'pending',
            ]);
            User::where('id', $userId)->update([
                'user_status' => 'Assigned',
            ]);
        }

        return redirect()->back()->with('success', 'Task successfully assigned to selected user.');
    }


    public function show(Assignment $assignment)
    {
        $payments = Payment::where('assignment_id', $assignment->id)->get();

        return view('operation.assign_details', compact('assignment', 'payments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the assignment by ID
        $assignment = Assignment::findOrFail($id);

        // Get the assigned user
        $user = User::find($assignment->user_id);

        // Update the user status if the user exists
        if ($user) {
            $user->update(['user_status' => 'active']); // Change 'inactive' to the desired status
        }

        $assignment->delete();
        return redirect()->back()->with('success', 'Assignment deleted and user status updated successfully.');
    }

    public function payment_update(Request $request)
    {
        // First, create the payment record
        $payment = Payment::create($request->all());
    
        
        $assignment = Assignment::findOrFail($payment->assignment_id);
     
        $assignment->total_amount += $payment->amount;  
        $assignment->save(); 
    
        return redirect()->back()->with('success', "Payment updated successfully");
    }
    

    public function payment_destroy($id)
    {
        // Find the payment record by its ID
        $payment = Payment::findOrFail($id);
        
        $assignment = Assignment::findOrFail($payment->assignment_id);
        
        $assignment->total_amount -= $payment->amount;
        
        $assignment->save();
        
        $payment->delete();
    
        return redirect()->back()->with('success', 'Payment deleted successfully');
    }
    

}
