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
        $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'fullname' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string', 'max:100'],
            'birthdate' => ['required', 'date'],
            'phonenumber' => ['required', 'string', 'max:20'],
            'agama' => ['required', 'string', 'max:20'],
            'jenisKelamin' => ['required', 'numeric', 'in:0.1'],
        ]);
// Iqbaal Hibatulloh - 6706220110
        $user = User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'role' => $request->role,
            'password' => ($$request->password),
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'phonenumber' => $request->phonenumber,
            'agama' => $request->agama,
            'jenisKelamin' => $request->jenisKelamin,
        ]);

        event(new Registered($user));

        //Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
