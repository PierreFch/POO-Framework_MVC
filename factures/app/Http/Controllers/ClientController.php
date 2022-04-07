<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index');
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request)
    {
        $input = $request->only([
            'reference',
            'user_id',
            'name',
            'email',
            'phone',
            'company_siret',
            'company_address',
        ]);
        $client = Client::create($input);

        return redirect()->route('dashboard');
    }

    public function show(Client $client)
    {
        return view('clients.show', ['client' => $client]);
    }


    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }


    public function update(UpdateClientRequest $request, Client $client)
    {
        $input = $request->only([
            'reference',
            'name',
            'email',
            'phone',
            'company_siret',
            'company_address',
        ]);

        $client->update($input);

        return redirect()->route('clients.index');
    }


    public function destroy(Client $client)
    {

        if (Auth::user() == $client){
            $client->delete();
        } else {
            return redirect()->back()->with('not-allowed', 'Vous ne pouvez pas supprimer cet utilisateur');
        }

        return redirect()->route('dashboard');
    }
}
