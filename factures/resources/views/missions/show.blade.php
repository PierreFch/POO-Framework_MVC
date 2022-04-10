@extends('layout')

@section('content')
    <div class="divPage divMissions show">
        <h1>{{ $mission->title }}</h1>

        <div class="data">
            <div><span class="bold">Titre :</span> {{ $mission->title }}</div>
            <div><span class="bold">Référence :</span> {{ $mission->reference }}</div>
            <div><span class="bold">Acompte :</span> {{ $mission->advance }} %</div>
        </div>
        <div class="bottom">
            <div class="edit">
                <a href="{{ route('missions.edit', $mission) }}" title="Modifier la mission"
                   class="button blue">Modifier</a>
            </div>
            <div class="delete">
                <form action="{{ route('missions.destroy', $mission) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" id="destroy" name="destroy" value="Supprimer"
                           class="button danger">
                </form>
            </div>
        </div>

        <div class="list">
            <h2>Liste des lignes de mission</h2>
            <div class="add">
                <a href="{{ route('missionLines.create', $mission) }}" title="Ajouter une ligne de mission" class="button pink">Ajouter
                    une ligne de mission</a>
            </div>
            <table>
                <thead>
                <tr>
                    <th>Titre</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Total TTC <span class="little">TVA 20%</span></th>
                </tr>
                </thead>
                <tbody>
                @foreach($mission->missionLines as $missionLine)
                    <tr>
                        <td>{{ $missionLine->title }}</td>
                        <td>{{ $missionLine->quantity }}</td>
                        <td>{{ $missionLine->unit_price }} €</td>
                        <td>{{ number_format((($missionLine->quantity * $missionLine->unit_price) / 1.2) ,2) }} €</td>
                        <td class="text-right">
                            <a href="{{ route('missionLines.edit', $missionLine) }}" title="Modifier la ligne de mission"
                               class="button blue">Modifier</a>
                        </td>
                        <td class="text-right">
                            <form action="{{ route('missionLines.destroy', $missionLine) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" id="destroy" name="destroy" value="Supprimer"
                                       class="button danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
