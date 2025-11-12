<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function users(){

        $user = Auth::user();

        if (! $user || ! $user->hasRole('admin')) {
            return redirect()->back()->with('error', 'Access denied, unauthorized access');
        }

        $users = User::query()
            ->with('roles')
            ->whereHas('roles', function ($query) {
                $query->whereIn('name', ['admin', 'staff']);
            })
            ->get();
        return view('users.user',compact('users'));
    }

    public function customers(Request $request){
        $search = $request->input('search');
        $users = User::query()
            ->with('roles')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'customer');
            })
            ->when($search, function ($query, $search) {
                return $query->where(function ($innerQuery) use ($search) {
                    $innerQuery->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->paginate(10);

        $user = Auth::user();

        if (! $user || ! $user->hasRole('admin')) {
            return redirect()->back()->with('error', 'Access denied, unauthorized access');
        }

        return view('users.customer',compact('users','search'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


}
