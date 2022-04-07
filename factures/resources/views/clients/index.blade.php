@extends('layout')

@section('content')
    <div class="divPage divClients">
        <a href="{{ route('dashboard') }}" title="Retour en arrière" class="back">
            <img src="{{ asset('data/images/back.png') }}" alt="Back" title="Retour en arrière"/>
            Retour en arrière
        </a>
        <h1>Mes clients</h1>
        <a href="{{ route('clients.create') }}" title="Ajouter un client" class="button pink">Ajouter un client</a>

        <table>
            <thead>
            <tr>
                <th>Référence</th>
                <th></th>
                <th>Nom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>SIRET</th>
                <th>Adresse</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->reference }}</td>
                    <td></td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->company_siret }}</td>
                    <td>{{ $client->company_address }}</td>
                    <td>
                        <a href="{{ route('clients.edit', $client) }}" title="Modifier l'utilisateur" class="button blue">Modifier</a>
                    </td>
                    <td>
                        <form action="{{ route('clients.destroy', $client) }}" method="POST">
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
