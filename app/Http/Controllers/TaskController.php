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
        $user = Auth::user();

        if (! $user || ! $user->hasRole(['admin', 'staff'])) {
            return redirect()->back()->with('error', 'Access denied, unauthorized access');
        }
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

        return view('book', compact('selectedProducts'));
    }

    public function bookCreate(Request $request)
    {
        $search = $request->input('search');

        $selectedProductIds = collect($request->input('selected', []))
            ->map(fn ($id) => (int) $id)
            ->filter()
            ->unique()
            ->values()
            ->all();

        // Paginate the products with search functionality
        $products = Product::when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('product_name', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        })
        ->paginate(12)
        ->appends($request->except('page'));

        $selectedProductDetails = ! empty($selectedProductIds)
            ? Product::whereIn('id', $selectedProductIds)->get()
            : collect();

        return view('jobs.prod_list', compact('products', 'search', 'selectedProductIds', 'selectedProductDetails'));
    }

    public function book_create(Request $request)
    {
        $productIds = collect($request->input('products', []))
            ->map(fn ($id) => (int) $id)
            ->filter()
            ->unique()
            ->values()
            ->all();

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
        try {
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

            // Calculate total amount (considering quantity)
            $totalAmount = 0;
            foreach ($request->product_id as $index => $productId) {
                $price = floatval($request->product_price[$index]);
                $quantity = intval($request->product_quantity[$index] ?? 1);
                $totalAmount += $price * $quantity;
            }

            // Get authenticated user ID if not provided
            $userId = $validated['user_id'] ?? Auth::id();

            // Create the Task with the calculated totalAmount
            $task = Task::create([
                'task_name' => $validated['task_name'],
                'event_date' => $validated['event_date'],
                'event_time' => $validated['event_time'],
                'event_address' => $validated['event_address'],
                'event_phone' => $validated['event_phone'],
                'event_email' => $validated['event_email'],
                'task_description' => $validated['task_description'] ?? null,
                'task_status' => $validated['task_status'],
                'user_id' => $userId,
                'total_amount' => (string)$totalAmount, // Store as string since column is varchar
            ]);

            // Create Task Products with the task_id
            foreach ($request->product_id as $index => $productId) {
                TaskProduct::create([
                    'task_id' => $task->id,
                    'product_id' => $productId,
                    'product_name' => $request->product_name[$index],
                    'product_price' => $request->product_price[$index],
                    'product_quantity' => $request->product_quantity[$index],
                    'product_image' => $request->product_image[$index],
                ]);
            }

            // Redirect based on user role
            $user = Auth::user();
            
            if ($user && $user->hasRole('customer')) {
                return redirect('/my-dashboard')->with('success', 'Booking confirmed successfully! Our team will reach out to you soon.');
            } elseif ($user && ($user->hasRole('admin') || $user->hasRole('staff'))) {
                return redirect()->route('task.index')->with('success', 'Task and products stored successfully!');
            } else {
                return redirect('/dashboard')->with('success', 'Booking confirmed successfully!');
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return validation errors with input
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Booking submission error: ' . $e->getMessage());
            
            return redirect()->back()
                ->with('error', 'An error occurred while processing your booking. Please try again.')
                ->withInput();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

        $users = User::query()
            ->with('roles')
            ->where('user_status', 'active')
            ->whereHas('roles', function ($query) {
                $query->whereIn('name', ['admin', 'staff']);
            })
            ->get();

        $assignedUsers = User::whereHas('assignments', function ($query) use ($task) {
            $query->where('task_id', $task->id);
        })->get();
        $products = $task->taskProducts;

        return view('jobs.taskshow', compact('task', 'products', 'users', 'assignedUsers'));
    }

    public function task_details(Task $task)
    {
        $user = Auth::user();
        
        // If user is a customer, ensure they can only view their own tasks
        if ($user && $user->hasRole('customer')) {
            if ($task->user_id !== $user->id) {
                return redirect()->route('my-dashboard')->with('error', 'You do not have permission to view this booking.');
            }
        }
        
        $users = User::query()
            ->with('roles')
            ->where('user_status', 'active')
            ->whereHas('roles', function ($query) {
                $query->whereIn('name', ['admin', 'staff']);
            })
            ->get();
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
