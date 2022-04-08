<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegisterUserFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()){
            return redirect(route('dashboard'));
        }
        return view('welcome');
    }

    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::where('github_id', $githubUser->id)->first();

        if ($user) {
            Auth::login($user);
            return redirect(route('dashboard'))->with('success', 'Vous êtes connecté !');
        }

        return view('users.register',
            [
                'github_id' => $githubUser->id,
                'name' => $githubUser->name,
                'email' => $githubUser->email
            ]);
    }

    public function registration(RegisterUserFormRequest  $request)
    {
        $input = $request->safe()->only([
            'github_id',
            'name',
            'email',
            'contact_email',
            'phone',
            'company_address',
            'company_siret',
            'company_ape',
            'bank_incumbent',
            'bank_domiciliation',
            'bank_rib',
            'bank_iban',
            'bank_bic',
        ]);

        $user = User::create($input);

        Auth::login($user);

        return redirect(route('dashboard'))->with('success', 'Bravo ! Vous êtes inscrit.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('index'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
