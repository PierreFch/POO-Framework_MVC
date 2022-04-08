@extends('layout')

@section('content')
    <div class="divPage divClients create">
        <h1>Ajouter un client</h1>
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ Auth::user()->id}}" id="user_id" name="user_id">

            <div class="text">
                <label for="reference">Référence : </label>
                <input type="text" value="{{ old('reference') }}" placeholder="Référence" id="reference" name="reference">
                @error ('reference')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <label for="name">Nom: </label>
                <input type="text" value="{{ old('name') }}" placeholder="Nom" id="name" name="name">
                @error ('name')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="email">
                <label for="email">Email : </label>
                <input type="email" value="{{ old('email') }}" placeholder="Email" id="email" name="email">
                @error ('email')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="phone">
                <label for="phone">Numéro de téléphone : </label>
                <input type="tel" value="{{ old('phone') }}" placeholder="Numéro de téléphone" id="phone" name="phone">
                @error ('phone')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <label for="company-siret">SIRET : </label>
                <input type="text" value="{{ old('company_siret') }}" placeholder="SIRET" id="company-siret" name="company_siret">
                @error ('company_siret')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <label for="company-address">Adresse : </label>
                <input type="text" value="{{ old('company_address') }}" placeholder="Adresse" id="company-address" name="company_address">
                @error ('company_address')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="submit">
                <input type="submit" value="Ajouter le client">
            </div>
        </form>
    </div>
@endsection
