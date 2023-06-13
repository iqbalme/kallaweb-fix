<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('dashboard.admin');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
	
	public function logout(Request $request)
	{
		Auth::logout();	 
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('login');
	}
	
	public function register()
    {
        return view('admin.register');
    }
	
	public function index()
    {
		$users = User::all();
        return view('admin.user');
    }
}
