@extends('layout')

@section('content')
    <div class="divPage divClients edit">
        <a href="{{ route('clients.index') }}" title="Retour en arrière" class="back">
            <img src="{{ asset('data/images/back.png') }}" alt="Back" title="Retour en arrière"/>
            Retour en arrière
        </a>
        <h1>Modifier : {{ $client->name }}</h1>

        <form action="{{ route('clients.update', $client) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="text">
                <input type="text" value="{{ $client->reference }}" placeholder="Référence client" id="reference" name="reference">
                @error ('reference')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <input type="text" value="{{ $client->name }}" placeholder="Nom du client" id="name" name="name">
                @error ('name')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="email">
                <input type="email" value="{{ $client->email }}" placeholder="Email du client" id="email" name="email">
                @error ('email')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="phone">
                <input type="tel" value="{{ $client->phone }}" placeholder="Numéro de téléphone du client" id="phone" name="phone">
                @error ('phone')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <input type="text" value="{{ $client->company_siret }}" placeholder="SIRET du client" id="company-siret" name="company_siret">
                @error ('company_siret')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <input type="text" value="{{ $client->company_address }}" placeholder="Adresse du client" id="company-address" name="company_address">
                @error ('company_address')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="submit">
                <input type="submit" value="Modifier le client">
            </div>
        </form>

    </div>
@endsection
