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

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|max:255',
            'password' => 'required',
        ]);

        if(!Auth::attempt($request->only('email', 'password')))
        {
            return back()->withErrors(['password' => 'Invalid password']);
        }

        return redirect()->route('fridges.index');
    }
}
