<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AuthController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (auth()->attempt($request->validated())) {
            $request->session()->regenerate();

            session()->flash('message', 'Logged in successfully!');

            // FIX: somehow this does not work
            // return redirect()->intended(to_action([DashboardController::class, 'index']));
            return to_action([DashboardController::class, 'index']);
        }

        return back()->withErrors(['password' => 'wrong credentials']);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_action([AuthController::class, 'login']);
    }
}
