<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendEmail;
use App\Jobs\SendMailJob;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(
            ['logout', 'dashboard', 'beranda']
        );
    }
    //hanya logout dan dashboard yang dapat diakses setelah login

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'username' => $request->username,
            'fullname' => $request->name,
            'password' => Hash::make($request->password),
        ]);


        $credentials = $request->only('username', 'password'); //mengambil username dan password dari form
        Auth::attempt($credentials); //mencoba login dengan email dan password yang diambil dari form

        $request->session()->regenerate(); //mengatur ulang session
        return redirect()->route('dashboard')->withSuccess('You have successfully registered & logged in!'); //redirect ke halaman dashboard



    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'eror' => 'Username atau password salah'
        ])->onlyInput('username', 'remember', 'password');
    }

    public function dashboard()
    {

        if (Auth::check()) {
            $data_user = DB::table('users');
            $user = $data_user->where('id', Auth()->user()->id)->first();
            $fullname = $user->fullname;
            $username = $user->username;
            return view('auth.dashboard', compact('fullname', 'username'));
        }

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have successfully logged out!');
    }
}
