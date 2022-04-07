@extends('layout')

@section('content')
    <div class="divPage divDevis">
        <a href="{{ URL::previous() }}" title="Retour en arrière" class="back">
            <img src="{{ asset('data/images/back.png') }}" title="Retour en arrière"/>
            Retour en arrière
        </a>
        <h1>Modifier mon compte</h1>

        <form action="{{route('user.update', $user)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="top">
                <h2>Coordonnées</h2>
                <div class="text">
                    <input type="text" value="{{ $user->name }}" placeholder="Nom" id="name" name="name">
                    @error ('$user->name')
                    <div class="invalid"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="email">
                    <input type="email" value="{{ $user->email }}" placeholder="Email" id="email" name="email" readonly>
                    @error ('$user->email')
                    <div class="invalid"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="email">
                    <input type="email" value="{{ $user->contact_email }}" placeholder="Email de contact" id="contact-email" name="contact_email">
                    @error ('$user->contact_email')
                    <div class="invalid">{{ $message }}</div>
                    @enderror
                </div>
                <div class="phone">
                    <input type="tel" value="{{ $user->phone }}" placeholder="Numéro de téléphone" id="phone" name="phone">
                    @error ('$user->phone')
                    <div class="invalid">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="bottom">
                <div class="left">
                    <h2>Entreprise</h2>
                    <div class="text">
                        <input type="text" value="{{ $user->company_address }}" placeholder="Adresse de l'entreprise" id="company-address" name="company_address">
                        @error ('$user->company_address')
                        <div class="invalid">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text">
                        <input type="text" value="{{ $user->company_siret }}" placeholder="Numéro de SIRET" id="company-siret" name="company_siret">
                        @error ('$user->company_siret')
                        <div class="invalid">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text">
                        <input type="text" value="{{ $user->company_ape }}" placeholder="Code APE" id="company-ape" name="company_ape">
                        @error ('$user->company_ape')
                        <div class="invalid">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="right">
                    <h2>Banque</h2>
                    <div class="text">
                        <input type="text" value="{{ $user->bank_incumbent }}" placeholder="Titulaire du compte" id="bank-incumbent" name="bank_incumbent">
                        @error ('$user->bank_incumbent')
                        <div class="invalid">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text">
                        <input type="text" value="{{ $user->bank_domiciliation }}" placeholder="Domiciliation" id="bank-domiciliation" name="bank_domiciliation">
                        @error ('$user->bank_domiciliation')
                        <div class="invalid">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text">
                        <input type="text" value="{{ $user->bank_rib }}" placeholder="RIB" id="bank-rib" name="bank_rib">
                        @error ('$user->bank_rib')
                        <div class="invalid">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text">
                        <input type="text" value="{{ $user->bank_iban }}" placeholder="IBAN" id="bank-iban" name="bank_iban">
                        @error ('$user->bank_iban')
                        <div class="invalid">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text">
                        <input type="text" value="{{ $user->bank_bic }}" placeholder="BIC" id="bank-bic" name="bank_bic">
                        @error ('$user->bank_bic')
                        <div class="invalid">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="submit">
                        <input type="submit" id="submit" value="Modifier mon compte">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
