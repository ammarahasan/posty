<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Validation\Rules\Password;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'min:2', 'max:255'],
            'username' => ['required', 'unique:users', 'alpha_dash', 'min:4', 'max:30'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => [
                'required', 'confirmed', "max:20", "min:8"
            ],
            'password_confirmation' => ['required']
        ];

        $this->validate($request, $rules);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        return Redirect()->route('dashboard');
    }
}
