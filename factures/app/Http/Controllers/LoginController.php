<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::updateOrCreate([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->token,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
