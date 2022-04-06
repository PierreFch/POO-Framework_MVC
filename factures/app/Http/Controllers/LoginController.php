<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegisterUserFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function register()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::where('github_id', $githubUser->id)->first();

        if ($user) {
            Auth::login($user);
            return redirect(route('index'));
        }

        return view('auth.register',
            [
                'github_id' => $githubUser->id,
                'name' => $githubUser->name,
                'email' => $githubUser->email
            ]);
    }

    public function registration(RegisterUserFormRequest  $request)
    {
        $input = $request->only([
            'github_id',
            'name',
            'email',
            'contact_email',
            'phone',
            'company_address',
            'company_siret',
            'APE',
            'bank_incumbent',
            'bank_domiciliation',
            'bank_details',
            'IBAN',
            'BIC',
        ]);
        $user = User::create($input);

        Auth::login($user);

        return redirect()->route('index');


    }
}
