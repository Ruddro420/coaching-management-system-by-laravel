<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        // Validate the incoming request data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_role' => ['required', 'string'], // Ensure valid roles
        ]);

        // Create a new user with the validated data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_role' => $request->user_role, // Save selected role
        ]);

        // Trigger the Registered event
        event(new Registered($user));

        // Log in the newly registered user
        Auth::login($user);

        // Redirect based on the user's role
        if ($user->user_role == 'admin') {
            // Redirect admins to the dashboard
            return redirect('/dashboard');
        } elseif ($user->user_role == 'result') {
            // Redirect 'result' role users to the 'add result' page
            return redirect('/dashboard/class/add');
        } elseif ($user->user_role == 'fee_collection') {
            // Redirect 'result' role users to the 'add result' page
            return redirect('/dashboard/fees/view');
        }elseif ($user->user_role == 'admission') {
            // Redirect 'result' role users to the 'add result' page
            return redirect('/dashboard/students/view');
        }

        // Default redirection (fallback for other roles, if any)
        return redirect(RouteServiceProvider::HOME);
    }
}
