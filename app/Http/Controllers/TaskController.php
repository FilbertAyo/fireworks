<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Task;
use App\Models\TaskProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
   
    public function index()
    {
        $products = Product::all();
        $tasks = Task::all();
        return view('jobs.task', compact('tasks', 'products'));
    }

    public function book(Request $request)
    {
        // Get the selected product IDs from the request
        $productIds = $request->input('products', []);

        // Fetch the selected products from the database
        $selectedProducts = Product::whereIn('id', $productIds)->get();

        // Pass the products to the view
        return view('book', compact('selectedProducts'));
    }

    public function book_create(Request $request)
    {
        $productIds = $request->input('products', []);

        $selectedProducts = Product::whereIn('id', $productIds)->get();

        return view('jobs.create', compact('selectedProducts'));
      
    }

    public function myTask()
    {
        $userId = Auth::id();

        // Fetch all tasks assigned to the user efficiently
        $tasks = Assignment::where('user_id', $userId)->with('task')->get()->pluck('task');

        return view('jobs.mytask', compact('tasks'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'event_address' => 'required|string|max:255',
            'event_phone' => 'required|string|max:15',
            'event_email' => 'required|email',
            'task_description' => 'nullable|string',
            'product_id.*' => 'required|integer',
            'product_name.*' => 'required|string',
            'product_price.*' => 'required|numeric',
            'product_quantity.*' => 'required|integer',
            'product_image.*' => 'required|string',
            'task_status' => 'required|string',
            'user_id' => 'nullable',
        ]);

        // Calculate total amount
        $totalAmount = 0;
        foreach ($request->product_id as $index => $productId) {
            $totalAmount += $request->product_price[$index];
        }

        // Create the Task with the calculated totalAmount
        $task = Task::create([
            'task_name' => $validated['task_name'],
            'event_date' => $validated['event_date'],
            'event_time' => $validated['event_time'],
            'event_address' => $validated['event_address'],
            'event_phone' => $validated['event_phone'],
            'event_email' => $validated['event_email'],
            'task_description' => $validated['task_description'],
            'task_status' => $validated['task_status'],
           'user_id' => $validated['user_id'] ?? null, 
            'total_amount' => $totalAmount,
        ]);

        // Create Task Products with the task_id
        foreach ($request->product_id as $index => $productId) {
            TaskProduct::create([
                'task_id' => $task->id, // Use the created task's ID
                'product_id' => $productId,
                'product_name' => $request->product_name[$index],
                'product_price' => $request->product_price[$index],
                'product_quantity' => $request->product_quantity[$index],
                'product_image' => $request->product_image[$index],
            ]);
        }

        return redirect()->back()->with('success', 'Task and products stored successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $users = User::all()->where('user_status', 'active')->whereIn('userType', [0, 1]);

        $assignedUsers = User::whereHas('assignments', function ($query) use ($task) {
            $query->where('task_id', $task->id);
        })->get();
        $products = $task->taskProducts;

        return view('jobs.taskshow', compact('task', 'products', 'users', 'assignedUsers'));
    }

    public function task_details(Task $task)
    {
        $users = User::all()->where('user_status', 'active');
        $assignedUsers = User::whereHas('assignments', function ($query) use ($task) {
            $query->where('task_id', $task->id);
        })->get();

        $products = $task->taskProducts;

        return view('task_details', compact('task', 'products', 'users', 'assignedUsers'));
    }


    public function edit(Task $task)
    {
        //
    }


    public function update($id)
    {
        $task = Task::find($id);
        $task->update(['payment_status' => 'Paid']);

        return redirect()->back()->with('success', 'Payment status updated successfully!');
    }

    public function task_done($id)
    {
        // Find the task
        $task = Task::find($id);
        if (!$task) {
            return redirect()->back()->with('error', 'Task not found!');
        }
    
        $task->update(['task_status' => 'Completed']);
    
        $assignments = Assignment::where('task_id', $task->id)->get();
    
        if ($assignments->isNotEmpty()) {
            Assignment::where('task_id', $task->id)->update(['status' => 'Completed']);
    
            $userIds = $assignments->pluck('user_id')->unique();
    
            User::whereIn('id', $userIds)->update(['user_status' => 'active']);
        }
    
        return redirect()->back()->with('success', 'Task done successfully!');
    }
    
    
   
    public function destroy(Task $task)
    {
        //
    }

  
}
