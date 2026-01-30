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
            'nip' => 'required|string|unique:users,nip',
            'password' => 'string|confirmed',
        ]);
        $upt = Upt::find($request->upt_id);
        User::create([
            'upt_id' => $upt->id,
            'name' => $upt->namaUpt,
            'nip' => $request->nip,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('regisPage')->with('success', 'Berhasil membuat akun');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $privacy = $request->validate([
            'nip' => 'required',
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
            'nip' => 'nullable|string|unique:users,nip,'.$user->id,
        ]);
        $user->update($request->only(['name', 'nip']));

        return back()->with('success', 'Berhasil memperbarui profil');
    }
    public function forgotPage(){
        return view('auth.forgot');
    }
    public function forgot(Request $request){
        $request->validate([
            'nip'=>'required|string',
        ]);
        $user=User::where('nip',$request->nip)->first();
        if(!$user){
            return back()->withErrors(['nip'=>'NIP tidak ditemukan']);
        }
        return redirect()->route('reset.page',$user->nip);
    }
    public function resetPage($nip){
        return view('auth.reset',compact('nip'));
    }
    public function reset(Request $request, $nip){
        $request->validate([
            'password' => 'required|min:8|confirmed'
        ]);
        $user = User::where('nip', $nip)->firstOrFail();
         $user->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('loginPage')->with('success', 'Password berhasil direset!');
    }
}
