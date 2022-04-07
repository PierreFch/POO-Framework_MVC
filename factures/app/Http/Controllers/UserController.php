<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index', ['user' => Auth::user()]);
    }

    public function edit()
    {
        return view('user.edit', ['user' => Auth::user()]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $input = $request->only([
            'name',
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

        $user->update($input);

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        if (Auth::user() == $user){
            $user->delete();
        } else {
            return redirect()->back()->with('not-allowed', 'Vous ne pouvez pas supprimer cet utilisateur');
        }

        return redirect()->route('index');
    }
}
