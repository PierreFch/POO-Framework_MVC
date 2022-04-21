@extends('layout')

@section('content')
    <div class="divPage divMissions show">
        <h1>{{ $mission->title }}</h1>
        <img src="{{ asset('data/images/options.svg') }}" alt="options" title="Options de la mission." id="options"/>
        <div id="actions">
            <div class="edit">
                <a href="{{ route('missions.edit', $mission) }}" title="Modifier la mission"
                   class="button blue">Modifier</a>
            </div>

            <div class="destroy">
                <button title="Supprimer la mission" class="button danger" id="delete">Supprimer</button>
            </div>

            <div id="modalBox">
                <div class="content text-center">
                    <span class="close">&times;</span>
                    <h2>Etes-vous certains de vouloir supprimer cette mission ?</h2>
                    <div class="choice">
                        <span id="no">Non</span>
                        <form action="{{ route('missions.destroy', $mission) }}" method="POST" id="yes">
                            @csrf
                            @method('DELETE')
                            <input type="submit" id="destroy" name="destroy" value="Oui"
                                   class="button danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="data">
            <div><span class="bold">Titre :</span> {{ $mission->title }}</div>
            <div><span class="bold">Référence :</span> {{ $mission->reference }}</div>
            <div><span class="bold">Acompte :</span> {{ $mission->advance }} %</div>
        </div>

        <a href="{{ route('quote.show', $mission) }}" title="Générer un devis" class="button pink-border">Générer un devis</a>

        <div class="list">
            <h2>Liste des lignes de mission</h2>
            <div class="add">
                <a href="{{ route('missionLines.create', $mission) }}" title="Ajouter une ligne de mission"
                   class="button pink">Ajouter
                    une ligne de mission</a>
            </div>
            @if(count($mission->missionLines) < 1)
                <div class="empty text-center">
                    Aucune ligne de mission trouvée.
                    <div class="picture">
                        <img src="{{ asset('data/images/empty.png') }}" alt="Vide" title="Aucune ligne de mission trouvée."/>
                    </div>
                </div>
            @else
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
                    @foreach($mission->missionLines as $missionLine)
                        <tr>
                            <td>{{ $missionLine->title }}</td>
                            <td>{{ $missionLine->quantity }}</td>
                            <td>{{ $missionLine->unit_price }} €</td>
                            <td>{{ $missionLine->total_ttc }} €</td>
                            <td class="text-right">
                                <a href="{{ route('missionLines.edit', $missionLine) }}"
                                   title="Modifier la ligne de mission"
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
            @endif
        </div>
    </div>
@endsection
