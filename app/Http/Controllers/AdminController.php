<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show admin dashboard (list of users)
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'desc')->paginate(15);
        return view('admin.index', compact('users'));
    }

    // Show edit form for a user
    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Only set password if provided
        if (!empty($data['password'])) {
            $user->password = $data['password'];
        }

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role = $data['role'];
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'User berhasil diupdate.');
    }

    // Delete user
    public function destroy(User $user)
    {
        // Prevent deleting yourself
        if (auth()->id() === $user->id) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus user yang sedang login.');
        }

        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User berhasil dihapus.');
    }
}

