@extends('layout')

@section('content')
    <div class="divPage divClients edit">
        <a href="{{ route('dashboard') }}" title="Retour en arrière" class="back">
            <img src="{{ asset('data/images/back.png') }}" alt="Back" title="Retour en arrière"/>
            Retour en arrière
        </a>
        <h1>NOM_DU_CLIENT</h1>


    </div>
@endsection
