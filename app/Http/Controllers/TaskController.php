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

        if ($user->userType != 0) {
            redirect:
            return redirect()->back()->with('error', 'Access denied, Unauthorized access');
        }
        $products = Product::all();
        $tasks = Task::all();
        return view('jobs.task', compact('tasks', 'products'));
    }


    public function bookCreate(Request $request)

    {
        $search = $request->input('search');
        // Paginate the products with search functionality
        $products = Product::where('quantity','>',0)->when($search, function ($query, $search) {
            return $query->where('product_name', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%");
        })
            ->paginate(12);
        return view('jobs.prod_list', compact('products', 'search'));
    }

    public function book_create(Request $request)
    {
        $productIds = session('cart', []);

        // Fetch products from DB
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
    public function create() {}

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

        session()->forget('cart');


        return redirect()->back()->with('success', 'Your booking sent successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

        $users = User::all()->where('user_status', 'active')->whereIn('userType', [0, 1]);
        $payments = Payment::where('task_id', $task->id)->get();

        $assignedUsers = User::whereHas('assignments', function ($query) use ($task) {
            $query->where('task_id', $task->id);
        })->get();
        $products = $task->taskProducts;

        return view('jobs.taskshow', compact('task', 'products', 'users', 'assignedUsers','payments'));
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

    public function taskPayment(Request $request)
    {
        $validated = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'payment_type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

       Payment::create([
            'task_id' => $validated['task_id'],
            'payment_type' => $validated['payment_type'],
            'amount' => $validated['amount'],
        ]);
        return redirect()->back()->with('success', 'Payment recorded successfully!');
    }

    public function edit(Task $task)
    {
        //
    }


    public function update($id)
    {
        // Find the task
        $task = Task::findOrFail($id);

        // Get all related TaskProducts
        $taskProducts = TaskProduct::where('task_id', $task->id)->get();

        // First: check if all products have enough stock
        foreach ($taskProducts as $taskProduct) {
            $product = Product::find($taskProduct->product_id);

            if (!$product || $product->quantity < $taskProduct->product_quantity) {
                return redirect()->back()->with('error', 'Insufficient stock for this product ');
            }
        }

        // All products have sufficient stock, now deduct quantity
        foreach ($taskProducts as $taskProduct) {
            $product = Product::find($taskProduct->product_id);
            $product->quantity -= $taskProduct->product_quantity;
            $product->save();
        }

        // Now update the task payment status
        $task->update(['payment_status' => 'Paid']);

        return redirect()->back()->with('success', 'Payment status updated and stock adjusted successfully!');
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



    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $cart = session()->get('cart', []);

        if (!in_array($productId, $cart)) {
            $cart[] = $productId;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function book(Request $request)
    {
        // Get product IDs from session cart
        $productIds = session('cart', []);

        // Fetch products from DB
        $selectedProducts = Product::whereIn('id', $productIds)->get();

        return view('book', compact('selectedProducts'));
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared successfully.');
    }
    public function remove($id)
    {
        $cart = session('cart', []);
        // Remove the product from the cart array
        $cart = array_filter($cart, function($item) use ($id) {
            return $item != $id;
        });
        session(['cart' => $cart]); // Update the session

        // Flash message for item removed
        session()->flash('cart_removed', true);

        return redirect()->back(); // Redirect back to the cart page
    }

}
