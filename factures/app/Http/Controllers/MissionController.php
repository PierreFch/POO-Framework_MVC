<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionRequest;
use App\Models\Client;
use App\Models\Mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissionController extends Controller
{
    public function index()
    {
        return view('missions.index');
    }

    public function create(Client $client)
    {
        return view('missions.create', ['client' => $client]);
    }

    public function store(MissionRequest $request, Client $client)
    {
        $input = $request->safe()->only([
            'title',
            'reference',
            'advance'
        ]);
        $mission = $client->missions()->create($input);
        return redirect(route('clients.show', $client))->with('success', "Nouvelle mission ajoutée !");
    }

    public function edit(Mission $mission)
    {
        return view('missions.edit', ['mission' => $mission]);
    }

    public function update(MissionRequest $request, Mission $mission, Client $client)
    {
        $input = $request->safe()->only([
            'ref',
            'title',
            'down_payment',
        ]);
        $mission->update($input);
        return redirect(route('clients.index', $client))->with('success', "Mission mise à jour !");
    }

    public function destroy(Mission $mission)
    {
        foreach (Auth::user()->$missions as $mission) {
            $mission->delete();
        }
        Auth::user()->delete();
        return redirect(route('missions.index'))->with('success', "La mission à été supprimé !");
    }
}
