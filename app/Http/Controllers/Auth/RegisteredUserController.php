<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => 'required',
            'role' => ['nullable', 'string', Rule::in(['admin', 'staff', 'customer'])],
        ]);

        $role = $request->input('role', 'customer') ?: 'customer';

        $isAdminRequest = in_array($role, ['admin', 'staff'], true);

        if ($isAdminRequest && (! Auth::check() || ! Auth::user()->hasRole('admin'))) {
            abort(403, 'Only administrators can create staff accounts.');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        $user->assignRole($role);

        if ($isAdminRequest) {

            event(new Registered($user));

            return redirect()->back()->with('success', 'New User is added successfully to the organisation');

        } elseif ($role === 'customer') {
            Auth::login($user);
            event(new Registered($user));

            return redirect()->route('my-dashboard')->with('success', 'You have successfully registered');

        } else {
            return redirect()->back()->with('error', 'Invalid User');
        }
    }
}
