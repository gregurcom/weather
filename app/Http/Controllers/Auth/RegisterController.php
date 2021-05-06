<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        if ($request->password === $request->repeatPassword) {
            $user = User::create(['name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            Auth::login($user);

            return redirect()->route('dashboard');
        }

        return back()->with('status', __('auth.alert.password_fail'));
    }
}
