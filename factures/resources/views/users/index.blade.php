@extends('layout')

@section('content')
    <div class="divPage divAccount">
        <h1>Mon compte</h1>

        <div class="columns">
            <div class="left">
                <h2>Mes coordonnées</h2>
                <div><span class="bold">Nom :</span> {{ $user->name }}</div>
                <div><span class="bold">Email :</span> {{ $user->email }}</div>
                <div><span class="bold">Email de contact :</span> {{ $user->contact_email }}</div>
                <div><span class="bold">Téléphone :</span> {{ $user->phone }}</div>
            </div>
            <div class="middle">
                <h2>Entreprise</h2>
                <div><span class="bold">Adresse :</span> {{ $user->company_address }}</div>
                <div><span class="bold">SIRET :</span> {{ $user->company_siret }}</div>
                <div><span class="bold">APE :</span> {{ $user->company_ape }}</div>
            </div>
            <div class="right">
                <h2>Banque</h2>
                <div><span class="bold">Titulaire :</span> {{ $user->bank_incumbent }}</div>
                <div><span class="bold">Domiciliation :</span> {{ $user->bank_domiciliation }}</div>
                <div><span class="bold">RIB :</span> {{ $user->bank_rib }}</div>
                <div><span class="bold">IBAN :</span> {{ $user->bank_iban }}</div>
                <div><span class="bold">BIC :</span> {{ $user->bank_bic }}</div>
            </div>
        </div>
        <div class="bottom">
            <div class="edit">
                <a href="{{ route('users.edit', $user) }}" title="Modifier mon compte" class="button">Modifier mon
                    compte</a>
            </div>
            <div class="destroy">
                <button title="Supprimer mon compte" class="button danger" id="delete">Supprimer mon
                compte</button>
            </div>

            <div id="modalBox">
                <div class="content text-center">
                    <span class="close">&times;</span>
                    <h2>Etes-vous certains de vouloir supprimer votre compte ?</h2>
                    <div class="choice">
                        <span id="no">Non</span>
                        <form action="{{ route('users.destroy', $user) }}" method="POST" id="yes">
                            @csrf
                            @method('DELETE')
                            <input type="submit" id="destroy" name="destroy" value="Oui"
                                   class="button danger">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection



