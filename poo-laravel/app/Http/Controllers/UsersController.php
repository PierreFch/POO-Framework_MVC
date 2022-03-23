<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

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


    public function store(StoreUserRequest $request)
    {
        $input = $request->only(['name', 'email', 'avatar_url', 'password']);
        $input['password'] = bcrypt($input['password']); // Crypter le mot de passe
        $user = User::create($input);

        return redirect()->route('dashboard');
    }


    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }


    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        if (Auth::user()->is_admin){
            $input = $request->only(['name', 'email', 'avatar_url', 'is_admin']);
        } else {
            $input = $request->only(['name', 'email', 'avatar_url']);
        }

        $user->update($input);

        if (Auth::user()->is_admin){
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('users.index');
        }
    }


    public function destroy(User $user)
    {

        if (Auth::user() == $user){
            $user->delete();
        } else {
            return redirect()->back()->with('not-allowed', 'Vous ne pouvez pas supprimer cet utilisateur');
        }

        return redirect()->route('dashboard');
    }
}
