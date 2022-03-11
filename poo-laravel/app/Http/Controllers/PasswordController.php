<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    public function forgot()
    {
        return view('auth.password.forgot');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
            ]
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function reset(string $token)
    {
        return view('auth.password.reset', ['token' => $token]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'password' => [
                'required',
                'confirmed',
                Password::min(4)
                    ->letters()
                    ->uncompromised()
            ]
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),

            function (User $user, string $password) {
                $user->update([
                    'password' => $password
                ]);
                Auth::login($user);
            }
        );
    }
}
