<?php

namespace App\Http\Controllers;

use App\Models\Upt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function regisPage()
    {
        $upts = Upt::all();

        return view('auth.register', compact('upts'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'upt_id' => 'required|exists:upts,id|unique:users,upt_id',
            'email' => 'email|unique:users,email',
            'password' => 'string|confirmed',
        ]);
        $upt=Upt::find($request->upt_id);
        $akun = User::create([
            'upt_id' => $upt->id,
            'name'=>$upt->namaUpt,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($akun);

        return redirect()->route('loginPage');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $privacy = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($privacy)) {
            $request->session()->regenerate();
            if (Auth::user()->role === 'upt') {
                return redirect('/dashboard/upt');
            } elseif (Auth::user()->role === 'muspin') {
                return redirect('/dashboard/muspin');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return redirect()->route('welcome');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if (! Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors([
                'current_password' => 'Password lama salah',
            ]);
        }
        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Berhasil memperbarui password');
    }

    public function updateProfil(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,'.$user->id,
        ]);
        $user->update($request->only(['name', 'email']));

        return back()->with('success', 'Berhasil memperbarui profil');
    }
}
