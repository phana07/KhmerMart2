<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('home');
    }

    public function about(){
        return view('about');
    }
     public function user(){
        $user = User::all();
        return response()->json($user);
    }
        public function register()
    {
        return view('register'); // Render the 'register' view
    }
     // Handle form submission
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Store the data (example: create a new user)
        // Replace this with your actual logic (e.g., saving to a database)
        $user = new \App\Models\User;
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->save();

        // Redirect after successful registration
        return redirect('/')->with('success', 'Registration successful!');
    }
}
