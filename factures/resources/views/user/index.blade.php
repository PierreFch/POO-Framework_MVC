@extends('layout')

@section('content')
    <div class="divPage divAccount">
        <a href="{{ route('dashboard') }}" title="Retour en arrière" class="back">
            <img src="{{ asset('data/images/back.png') }}" alt="Back" title="Retour en arrière"/>
            Retour en arrière
        </a>
        <h1>Mon compte</h1>

        <h2>Mes coordonnées</h2>
        <div>{{ $user->name }}</div>
        <div>{{ $user->email }}</div>
        <div>{{ $user->contact_email }}</div>
        <div>{{ $user->phone }}</div>

        <h2>Entreprise</h2>
        <div>{{ $user->company_address }}</div>
        <div>{{ $user->company_siret }}</div>
        <div>{{ $user->company_ape }}</div>

        <h2>Banque</h2>
        <div>{{ $user->bank_incumbent }}</div>
        <div>{{ $user->bank_domiciliation }}</div>
        <div>{{ $user->bank_rib }}</div>
        <div>{{ $user->bank_iban }}</div>
        <div>{{ $user->bank_bic }}</div>

        <div class="bottom">
            <a href="{{ route('user.edit') }}" title="Modifier mon compte" class="button">Modifier mon compte</a>
        </div>
    </div>
@endsection
