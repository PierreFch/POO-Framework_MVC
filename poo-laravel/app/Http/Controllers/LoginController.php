<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials) && ! Auth::user()->is_admin) {
            return redirect()->intended(route('users.index'));
        } elseif (Auth::attempt($credentials) && Auth::user()->is_admin){
            return redirect(route('dashboard'));
        }

        return redirect(route('auth.login'));
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registration(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Password::min(4)
                ->letters()
                ->uncompromised()
            ],
            'avatar_url' => 'required',
        ]);

        $user = User::create($data);

        Auth::login($user);

        return redirect(route('users.index'));
    }

    public function signOut() {
        Auth::logout();
        return redirect(route('auth.login'));
    }

    public function dashboard()
    {
        return view('dashboard', ['users' => User::all()]);
    }
}
