<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Model pasien menggantikan User
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
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:pasien,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'alamat' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:15'],
            'no_ktp' => ['required', 'string', 'max:16', 'unique:pasien,no_ktp'],
        ]);

        // Generate No RM
        $jumlahPasien = User::where('role', 'Pasien')->count();
        $noRm = now()->format('Ym') . '-' . ($jumlahPasien + 1);

        // Buat pengguna baru
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            'no_rm' => $noRm,
            'role' => 'Pasien',
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect(route('dashboard'));
    }
}
