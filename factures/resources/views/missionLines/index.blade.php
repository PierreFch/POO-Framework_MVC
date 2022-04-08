@extends('layout')

@section('content')
    <div class="divPage divMissionLines">
        <h1>Mes lignes de missions</h1>
        <a href="{{ route('missionLines.create', $mission) }}" title="Ajouter une ligne de mission" class="button pink">Ajouter une ligne de mission</a>

        <table>
            <thead>
            <tr>
                <th>Titre</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Total TTC</th>
            </tr>
            </thead>
            <tbody>
            @foreach($missionlines as $missionLine)
                <tr>
                    <td>{{ $missionLine->title }}</td>
                    <td>{{ $missionLine->quantity }}</td>
                    <td>{{ $missionLine->unit_price }}</td>
                    <td>{{ $missionLine->total_ttc }}</td>
                    <td>
                        <a href="{{ route('missionLines.edit', $missionLine) }}" title="Modifier la ligne de mission" class="button blue">Modifier</a>
                    </td>
                    <td>
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
@endsection
