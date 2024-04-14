<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('dashboard.Users.index', compact('users'));
    }

    public function edit($users_id){
        $user = User::find($users_id);
        return view('dashboard.Users.edit', compact('user'));
    }

    public function update(Request $request, $users_id){
        // Validate the request data
        $request->validate([
            'role_as' => 'required|in:0,1,2', // Assuming role_as should be one of these values
        ]);

        // Find the user by ID
        $user = User::find($users_id);

        if (!$user) {
            return redirect()->route('Users.index')->with('error', 'User not found');
        }

        // Update the user's role
        $user->role_as = $request->input('role_as');
        $user->update();

        return redirect()->route('Users.index', ['users_id' => $user->id])->with('success', 'User role updated successfully');
    }
}
