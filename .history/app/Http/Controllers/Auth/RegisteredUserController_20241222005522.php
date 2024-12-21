<?php

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
    }

    // Default redirection (fallback for other roles, if any)
    return redirect(RouteServiceProvider::HOME);
}
