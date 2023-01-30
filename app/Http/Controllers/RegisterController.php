<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('login-register.register', [
            'title' => 'Registration'
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|max:55',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|max:55|unique:users,username',
            'password' => 'required|min:8|max:55'
        ]);
        $request['password'] = Hash::make($request['password']);
        // dd();
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password
        ]);
        // dd($request->validate());
        return redirect()->route('login')->with('regisSuccess', 'Registration successfully, please login!');
    }
}
