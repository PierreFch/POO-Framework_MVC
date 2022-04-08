@extends('layout')

@section('content')
    <div class="divPage divClients show">
        <h1>{{ $client->name }}</h1>

        <div class="data">
            <div class="left">
                <h2>Coordonnées</h2>
                <div><span class="bold">Référence :</span> {{ $client->reference }}</div>
                <div><span class="bold">Nom :</span> {{ $client->name }}</div>
                <div><span class="bold">Email :</span> {{ $client->email }}</div>
                <div><span class="bold">Téléphone :</span> {{ $client->phone }}</div>
            </div>
            <div class="right">
                <h2>Entreprise</h2>
                <div><span class="bold">Adresse :</span> {{ $client->company_address }}</div>
                <div><span class="bold">SIRET :</span> {{ $client->company_siret }}</div>
            </div>
        </div>

        <div class="bottom">
            <div class="edit">
                <a href="{{ route('clients.edit', $client) }}" title="Modifier le client"
                   class="button blue">Modifier</a>
            </div>
            <div class="delete">
                <form action="{{ route('clients.destroy', $client) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" id="destroy" name="destroy" value="Supprimer"
                           class="button danger">
                </form>
            </div>
        </div>

        <div class="list">
            <h2>Liste des missions</h2>
            <div class="add">
                <a href="{{ route('missions.create', $client) }}" title="Ajouter une mission au client" class="button pink">Ajouter
                    une mission</a>
            </div>
            <table>
                <thead>
                <tr>
                    <th>Titre</th>
                    <th>Référence</th>
                    <th>Acompte</th>
                </tr>
                </thead>
                <tbody>
                @foreach($client->missions as $mission)
                    <tr>
                        <td>{{ $mission->title }}</td>
                        <td>{{ $mission->reference }}</td>
                        <td>{{ $mission->advance }} %</td>
                        <td class="showmore">
                            <a href="{{ route('missions.show', $mission) }}" title="En voir plus sur {{ $mission->title }}."></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
