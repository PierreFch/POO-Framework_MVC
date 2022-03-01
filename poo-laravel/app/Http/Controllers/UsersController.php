<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function index()
    {
        return view('users.index', ['users' => User::all()]);
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        $input = $request->only(['name', 'email', 'avatar_url', 'password']);
        $user = User::create($input);

        return redirect()->route('users.index');
    }


    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }


    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }


    public function update(Request $request, User $user)
    {
        $input = $request->only(['name', 'email', 'avatar_url', 'password']);
        $user->update($input);

        return redirect()->route('users.show', $user);
    }


    public function destroy(User $user)
    {
        $users = User::findOrFail($user);
        $users->delete();
        return view('users.delete', ['users' => $user]);
    }
}
