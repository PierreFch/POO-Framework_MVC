@extends('layout')

@section('content')
    <div class="divPage divClients">
        <a href="{{ route('dashboard') }}" title="Retour en arrière" class="back">
            <img src="{{ asset('data/images/back.png') }}" alt="Back" title="Retour en arrière"/>
            Retour en arrière
        </a>
        <h1>Mes clients</h1>


    </div>
@endsection
