<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){

         // Check the authenticated user's userType
        if (Auth::user()->userType == '2') {
            return redirect('/')->with('success', 'Welcome to the homepage');
        } else {
            return view('dashboard');
        }
    }

    public function myDashboard(){
        
        $userId = Auth::id();
        $tasks = Task::where('user_id', $userId)->get();

        return view('mydashboard',compact('tasks'));
    }
    public function home(){
        $users = User::whereIn('userType', [0, 1])->get();

        $products = Product::all();

        return view('welcome',compact('users', 'products'));
    }
    public function contact(){
        return view('contact');
    }

    public function about(){
        $users = User::all();
        return view('about',compact('users'));
    }
    public function deactivate(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->user_status = 'inactive';
    $user->save();

    return redirect()->back()->with('success', 'User has been deactivated successfully.');
}
}
