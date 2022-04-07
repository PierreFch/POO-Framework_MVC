@extends('layout')

@section('content')
    <div class="divPage divClients create">
        <a href="{{ route('dashboard') }}" title="Retour en arrière" class="back">
            <img src="{{ asset('data/images/back.png') }}" alt="Back" title="Retour en arrière"/>
            Retour en arrière
        </a>
        <h1>Ajouter un client</h1>


    </div>
@endsection
