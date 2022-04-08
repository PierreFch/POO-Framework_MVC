@extends('layout')

@section('content')
    <div class="divPage divClients">
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
            @foreach(Auth::user()->clients as $client)
                <tr>
                    <td>{{ $client->reference }}</td>
                    <td></td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->company_siret }}</td>
                    <td>{{ $client->company_address }}</td>
                    <td class="showmore"><a href="{{ route('clients.show', $client) }}" title="En voir plus sur {{ $client->name }}."></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
