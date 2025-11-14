<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard(){

        $user = Auth::user();

        if (! $user) {
            return redirect('/');
        }

        if ($user->hasRole(['admin', 'staff'])) {
            return redirect()->intended('/dash');
        }

        if ($user->hasRole('customer')) {
            return redirect()->intended(route('my-dashboard'));
        }

        return redirect('/');
    }

    public function dash(Request $request){
        $userId = Auth::id();
        $allowance = Payment::where('user_id',$userId)->where('expense_type','allowance')->sum('amount');
        $transport = Payment::where('user_id',$userId)->where('expense_type','transport')->sum('amount');
        $accommodation = Payment::where('user_id',$userId)->where('expense_type','accomodation')->sum('amount');
        $my_collection = Payment::where('user_id',$userId)->sum('amount');
        $events = Task::count();
        $up_events = Task::where('task_status','Pending')->count();
        $done_events = Task::where('task_status','Completed')->count();

        $year = $request->input('year', 'all'); // Default to 'all' for all years
        $month = $request->input('month', 'all'); // Default to 'all' for all months

        // Base query
        $allowanceQuery = Payment::where('expense_type', 'allowance');
        $transportQuery = Payment::where('expense_type', 'transport');
        $accommodationQuery = Payment::where('expense_type', 'accomodation');
        $collectionQuery = Task::where('task_status', 'Completed');

        // Apply filters if year/month is selected
        if ($year !== 'all') {
            $allowanceQuery->whereYear('created_at', $year);
            $transportQuery->whereYear('created_at', $year);
            $accommodationQuery->whereYear('created_at', $year);
            $collectionQuery->whereYear('created_at', $year);
        }
        if ($month !== 'all') {
            $allowanceQuery->whereMonth('created_at', $month);
            $transportQuery->whereMonth('created_at', $month);
            $accommodationQuery->whereMonth('created_at', $month);
            $collectionQuery->whereMonth('created_at', $month);
        }

        // Get sum of amounts
        $totalAllowance = $allowanceQuery->sum('amount');
        $totalTransport = $transportQuery->sum('amount');
        $totalAccommodation = $accommodationQuery->sum('amount');
        $totalCollection = $collectionQuery->sum(DB::raw('CAST(total_amount AS DECIMAL)'));

        $totalExpenses = $totalAllowance + $totalTransport + $totalAccommodation;
        $profitLoss = $totalCollection - $totalExpenses;

        return view('dashboard', compact('allowance', 'transport','accommodation','my_collection','events','up_events','done_events','totalAllowance', 'totalTransport', 'totalAccommodation', 'totalCollection', 'profitLoss', 'year', 'month'));
    }

    public function myDashboard(){

        $userId = Auth::id();
        $tasks = Task::where('user_id', $userId)->get();

        return view('mydashboard',compact('tasks'));
    }
    public function home(){
        $users = User::query()
            ->with('roles')
            ->whereHas('roles', function ($query) {
                $query->whereIn('name', ['admin', 'staff']);
            })
            ->get();

        $products = Product::inRandomOrder()->take(8)->get();
        $faqs = Faq::query()
            ->where('is_active', true)
            ->orderBy('id')
            ->get();

        return view('welcome',compact('users', 'products', 'faqs'));
    }
    public function contact(){
        return view('contact');
    }

    public function about(){
        $users = User::query()
            ->with('roles')
            ->whereHas('roles', function ($query) {
                $query->whereIn('name', ['admin', 'staff']);
            })
            ->get();
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

}
