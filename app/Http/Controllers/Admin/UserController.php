<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user', compact('users'));
    }

    public function create()
    {
        return view('admin.add-user');
    }

    public function store(UserPostRequest $request)
{
    $validated = $request->validated();

    User::create($validated);

    return redirect()->route('users')->with('success', 'User created successfully');
}


    public function edit($userId)
    {
        $users = User::findOrFail($userId);

        return view('admin.edit-user', compact('users'));
    }

    public function update(UserUpdateRequest $request, $userId)
    {
        $validated = $request->validated();

        $users = User::findOrFail($userId);

        $users->update($validated);

        return redirect()->route('users')->with('success', 'User updated successfully');
    }

    public function destroy($userId)
    {
        $users = User::findOrFail($userId);

        $users->delete();

        return redirect()->route('users')->with('success', 'User deleted successfully');
    }
}
