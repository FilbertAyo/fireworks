<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Partner;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard(){

        if (Auth::user()->userType == '2') {
            return redirect('/');
        } else {
            return redirect('/dash');
        }
    }

    public function dash(Request $request){
        $userId = Auth::id();
        $allowance = Expense::where('user_id',$userId)->where('expense_type','allowance')->sum('amount');
        $transport = Expense::where('user_id',$userId)->where('expense_type','transport')->sum('amount');
        $accommodation = Expense::where('user_id',$userId)->where('expense_type','accommodation')->sum('amount');
        $my_collection = Expense::where('user_id',$userId)->sum('amount');
        $events = Task::count();
        $up_events = Task::where('task_status','Pending')->count();
        $done_events = Task::where('task_status','Completed')->count();

        $year = $request->input('year', 'all'); // Default to 'all' for all years
        $month = $request->input('month', 'all'); // Default to 'all' for all months

        // Expenses
        $allowanceQuery = Expense::where('expense_type', 'allowance');
        $transportQuery = Expense::where('expense_type', 'transport');
        $accommodationQuery = Expense::where('expense_type', 'accommodation');
        $collectionQuery = Task::where('task_status', 'Completed');

        //Payments
        $operationQuery = Payment::where('payment_type', 'operation');
        $contractQuery = Payment::where('payment_type', 'contract');

        // Apply filters if year/month is selected
        if ($year !== 'all') {
            $allowanceQuery->whereYear('created_at', $year);
            $transportQuery->whereYear('created_at', $year);
            $accommodationQuery->whereYear('created_at', $year);
            $collectionQuery->whereYear('created_at', $year);
            $operationQuery->whereYear('created_at', $year);
            $contractQuery->whereYear('created_at', $year);
        }
        if ($month !== 'all') {
            $allowanceQuery->whereMonth('created_at', $month);
            $transportQuery->whereMonth('created_at', $month);
            $accommodationQuery->whereMonth('created_at', $month);
            $collectionQuery->whereMonth('created_at', $month);
            $operationQuery->whereMonth('created_at', $month);
            $contractQuery->whereMonth('created_at', $month);
        }

        // Get sum of amounts
        $totalAllowance = $allowanceQuery->sum('amount');
        $totalTransport = $transportQuery->sum('amount');
        $totalAccommodation = $accommodationQuery->sum('amount');
        $totalCollection = $collectionQuery->sum('total_amount');
        $totalOperation = $operationQuery->sum('amount');
        $totalContract = $contractQuery->sum('amount');

        $totalExpenses = $totalAllowance + $totalTransport + $totalAccommodation;
        $profitLoss = ($totalCollection + $totalOperation + $totalContract )- $totalExpenses;

        return view('dashboard', compact('allowance', 'transport','accommodation','my_collection','events','up_events','done_events','totalAllowance', 'totalTransport', 'totalAccommodation', 'totalCollection','totalOperation','totalContract', 'profitLoss', 'year', 'month'));
    }

    public function myDashboard(){

        $userId = Auth::id();
        $tasks = Task::where('user_id', $userId)->get();

        return view('mydashboard',compact('tasks'));
    }
    public function home(){
        $users = User::whereIn('userType', [0, 1])->get();
        $partners = Partner::all();
        $products = Product::inRandomOrder()->take(8)->get();

        return view('welcome',compact('users', 'products','partners'));
    }
    public function contact(){
        return view('contact');
    }

    public function about(){
        $users = User::whereIn('userType',[0,1])->get();
        return view('about',compact('users'));
    }
    public function updateStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->user_status = $request->user_status; // 'active' or 'blocked'
        $user->save();

        $message = $user->user_status == 'active' ? 'User has been activated' : 'User has been deactivated';

        return redirect()->back()->with('success', $message);
    }

    public function partners(){
        $partners = Partner::all();
        return view('settings.partners', compact('partners'));
    }

    public function partnerStore(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
        ]);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Unique filename
            $imagePath = 'partners/' . $imageName;
            $image->move(public_path('partners'), $imageName);
        }

        $partner = new Partner();
        $partner->name = $request->name;
        $partner->logo = $imagePath;

        // Save to database
        $partner->save();

        return redirect()->back()->with('success', 'Partner added successfully!');
    }

    public function partnerDestroy($id)
    {
        $partner = Partner::findOrFail($id);

        // Delete the image file if it exists
        $imagePath = public_path($partner->logo);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // Delete the database record
        $partner->delete();

        return redirect()->back()->with('success', 'Partner deleted successfully!');
    }

}
