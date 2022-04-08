<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients.index', ['clients' => Client::all()]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request)
    {
        $input = $request->safe()->only([
            'reference',
            'user_id',
            'name',
            'email',
            'phone',
            'company_siret',
            'company_address',
        ]);
        $client = Client::create($input);

        return redirect(route('clients.index'));
    }

    public function show(Client $client, Mission $mission)
    {
        return view('clients.show', ['client' => $client], ['mission' => $mission]);
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

        return redirect(route('clients.show', $client));
    }

    public function destroy(Client $client)
    {
        if (Auth::user() == $client->user)
        {
            $client->delete();
            return redirect(route('clients.index'))->with('success', 'Le client à été supprimé !');
        }
        return redirect(route('clients.index'))->with('error', "Vous ne pouvez pas supprimer ce client.");
    }
}
