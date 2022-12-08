<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        if ($request->role !== "user") {
            $credentials = $request->validate([
                'username' => "required",
                'password' => "required",
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->route('dashboard.index');
            }
        } else {
            $credentials = $request->nis;
            $userExists = User::where('nis', $credentials)->first();

            if (isset($userExists)) {
                return redirect()->route('form-alumni.index', [
                    'data_alumni' => $userExists
                ]);

            } else {
                return redirect()->route('login')->with('error', 'Data tidak ada disistem kami! Silakan masukan data yang valid.');
            }
        }

        return redirect()->route('login')->with('error', 'Username atau Password salah! Mohon cek kembali.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
