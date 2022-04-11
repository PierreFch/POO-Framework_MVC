<?php

namespace App\Http\Controllers;

use App\Http\Requests\MissionLineRequest;
use App\Models\Mission;
use App\Models\MissionLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissionLinesController extends Controller
{
    public function create(Mission $mission)
    {
        return view("missionLines.create", ['mission' => $mission]);
    }

    public function store(MissionLineRequest $request, Mission $mission)
    {
        $input = $request->safe()->only([
            'title',
            'quantity',
            'unit_price',
        ]);

        $totalTtc = $input['quantity'] * $input['unit_price'] ;
        $input['total_ttc'] = $totalTtc; // Push value with key in input array
        $mission_line = $mission->missionLines()->create($input);
        return redirect(route('missions.show', ['mission' => $mission]))->with('success', "Nouvelle ligne de mission créée !");
    }

    public function edit(MissionLine $missionLine)
    {
        return view('missionLines.edit', ['missionLine' => $missionLine]);
    }

    public function update(MissionLineRequest $request, MissionLine $missionLine)
    {
        $input = $request->safe()->only([
            'title',
            'quantity',
            'unit_price'
        ]);

        $totalTtc = $input['quantity'] * $input['unit_price'] ;
        $input['total_ttc'] = $totalTtc; // Push value with key in input array
        $missionLine->update($input);
        return redirect(route('missions.show', $missionLine->mission))->with('success', "Ligne de mission mise à jour !");
    }

    public function destroy(MissionLine $missionLine)
    {
        if (Auth::user() == $missionLine->mission->client->user)
        {
            $missionLine->delete();
            return redirect(route('missions.show', $missionLine->mission))->with('success', 'Ligne de mission supprimée !');
        }
        return redirect(route('missions.show', $missionLine->mission))->with('error', "Vous ne pouvez pas supprimer cette ligne de mission.");
    }
}
