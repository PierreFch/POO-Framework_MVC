<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionRequest;
use App\Models\Client;
use App\Models\Mission;
use App\Models\MissionLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;

class MissionController extends Controller
{
    public function create(Client $client)
    {
        return view('missions.create', ['client' => $client]);
    }

    public function store(MissionRequest $request, Client $client, Mission $mission)
    {
        $input = $request->safe()->only([
            'title',
            'reference',
            'advance'
        ]);
        $mission = $client->missions()->create($input);
        return redirect(route('missions.show', $mission))->with('success', "Nouvelle mission ajoutée !");
    }

    public function show(Mission $mission, Client $client)
    {
        return view('missions.show', ['mission' => $mission], ['client' => $client]);
    }

    public function edit(Mission $mission)
    {
        return view('missions.edit', ['mission' => $mission]);
    }

    public function update(MissionRequest $request, Mission $mission, Client $client)
    {
        $input = $request->only([
            'title',
            'reference',
            'advance',
        ]);
        $mission->update($input);
        return redirect(route('missions.show', ['mission' => $mission]))->with('success', "Mission mise à jour !");
    }

    public function destroy(Mission $mission, Client $client)
    {
        if (Auth::user() == $mission->client->user)
        {
            $mission->delete();
            foreach ($mission->missionLines as $missionLine) {
                $missionLine->delete();
            }
            return redirect(route('clients.show', $client))->with('success', "La mission à été supprimé !");
        }
        return redirect(route('clients.show', $client))->with('error', "La mission ne peut pas être supprimé !");
    }

    public function showQuote(Mission $mission)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('quote.show', ['mission' => $mission]));

        $dompdf->setPaper('A4');

        $dompdf->render();

        $dompdf->stream();
    }
}
