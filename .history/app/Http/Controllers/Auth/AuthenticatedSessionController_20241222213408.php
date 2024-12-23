<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user
        $request->authenticate();

        // Regenerate session to prevent session fixation attacks
        $request->session()->regenerate();

        // Get the authenticated user
        $user = Auth::user();

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
        } elseif ($user->user_role == 'admission') {
            // Redirect 'result' role users to the 'add result' page
            return redirect('/dashboard/students/view');
        }

        // Default redirection (fallback for other roles, if any)
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Log out the user
        Auth::guard('web')->logout();

        // Invalidate the session to prevent session hijacking
        $request->session()->invalidate();

        // Regenerate the CSRF token to prevent attacks
        $request->session()->regenerateToken();

        // Redirect to home or any page after logout
        return redirect('/');
    }


    // view all users

    public function view(){
        $data = Auth::all();
        return view('pages.admin.users.view', compact('data'));
    }




}
