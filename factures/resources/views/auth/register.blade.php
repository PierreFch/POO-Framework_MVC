@extends('layout')

@section('content')
    <div class="divPage divRegister">

    <form action="{{ route('auth.registration') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $github_id }}" name="github_id" required>
        <div class="top">
            <h1>Inscription</h1>
            <div class="text">
                <input type="text" value="{{ $name }}" placeholder="Nom" id="name" name="name">
                @error ('name')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="email">
                <input type="email" value="{{ $email }}" placeholder="Email" id="email" name="email">
                @error ('email')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="email">
                <input type="email" value="{{ old('contact_email') }}" placeholder="Email de contact" id="contact-email" name="contact-email">
                @error ('email')
                    <div class="invalid">{{ $message }}</div>
                @enderror
            </div>
            <div class="phone">
            <input type="tel" value="{{ old('phone') }}" placeholder="Numéro de téléphone" id="phone" name="phone">
            @error ('phone')
            <div class="invalid">{{ $message }}</div>
            @enderror
        </div>
        </div>
        <div class="bottom">
            <div class="left">
                <h2>Entreprise</h2>
                <div class="text">
                    <input type="text" value="{{ old('company_name') }}" placeholder="Nom de l'entreprise" id="company-name" name="company-name">
                    @error ('company_name')
                    <div class="invalid">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text">
                    <input type="text" value="{{ old('company_address') }}" placeholder="Adresse de l'entreprise" id="company-address" name="company-address">
                    @error ('company_address')
                    <div class="invalid">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text">
                    <input type="text" value="{{ old('company_siret') }}" placeholder="Numéro de SIRET" id="company-siret" name="company-siret">
                    @error ('company_siret')
                    <div class="invalid">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text">
                    <input type="text" value="{{ old('APE') }}" placeholder="Code APE" id="APE" name="APE">
                    @error ('APE')
                    <div class="invalid">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="right">
            <h2>Banque</h2>
            <div class="text">
                <input type="text" value="{{ old('bank_incumbent') }}" placeholder="Titulaire du compte" id="bank-incumbent" name="bank-incumbent">
                @error ('bank_incumbent')
                <div class="invalid">{{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <input type="text" value="{{ old('bank_domiciliation') }}" placeholder="Domiciliation" id="bank-domiciliation" name="bank-domiciliation">
                @error ('bank_domiciliation')
                <div class="invalid">{{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <input type="text" value="{{ old('bank_details') }}" placeholder="RIB" id="RIB" name="RIB">
                @error ('bank_details')
                <div class="invalid">{{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <input type="text" value="{{ old('IBAN') }}" placeholder="IBAN" id="IBAN" name="IBAN">
                @error ('IBAN')
                <div class="invalid">{{ $message }}</div>
                @enderror
            </div>
            <div class="text">
            <input type="text" value="{{ old('BIC') }}" placeholder="BIC" id="BIC" name="BIC">
            @error ('BIC')
            <div class="invalid">{{ $message }}</div>
            @enderror
        </div>
            <div class="submit">
                <button type="submit">S'inscrire</button>
            </div>
        </div>
        </div>
    </form>
</div>
@endsection
