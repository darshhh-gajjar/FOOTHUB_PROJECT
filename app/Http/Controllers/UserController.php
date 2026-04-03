<?php

namespace App\Http\Controllers;

use App\Models\User;   // Capital U
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

public function displayUsers()
    {
        $users = User::all();
        return response()->json($users);
    }


    public function index()
    {
        $data = User::all();

        return response()->json([
            'users' => $data
        ]);
    }

    public function create()
    {
        return view('website.register');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|digits_between:10,15',
            'password' => 'required|min:4',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $table = new User();

       
        $file=$request->file('image');
        $filename=time()."_img.".$request->file('image')->getClientOriginalExtension(); 
        $file->move('uploads/users/',$filename); 
        $table->image=$filename;


        $table->name = $request->name;
        $table->email = $request->email;
        $table->phone = $request->phone; 
        $table->password = Hash::make($request->password);
        $table->address = $request->address;
        $table->city = $request->city;
        $table->pincode = $request->pincode;
        $table->country = $request->country;
        $table->state = $request->state;
        $table->gender = $request->gender;
        $table->date_of_birth = $request->date_of_birth;

        $table->save();

         return redirect('/login')->with('success', 'Registration successful! Please log in.');

           return response()->json([
            'message' => 'User registered successfully',
            'user' => $table
        ], 201);
    }

    public function show(User $user)
    {
        $data = User::all();
        return response()->json([
            'users' => $data
        ]);

         return view('admin.admin_users', ["users" => $data]);
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home')->with('success', 'Logged in successfully.');
        }

        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }

    public function updateProfile(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = $request->user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please login first.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|string',
        ]);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->date_of_birth = $request->date_of_birth;
        $user->gender = $request->gender;
        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }
}