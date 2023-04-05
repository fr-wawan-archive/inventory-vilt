<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function index()
    {
        return Inertia::render('Auth/Register');
        
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required | max:255',
            'email' => 'required | max:255 | unique:users', 
            'password' => 'required | min:5 | max:255 | confirmed'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);


      return redirect()->route('suppliers.index')->with('message','Registration Successfull! Please Login');
    }
}
