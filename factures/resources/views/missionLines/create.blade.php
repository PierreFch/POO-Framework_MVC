@extends('layout')

@section('content')
    <div class="divPage divMissionLines create">
        <h1>Ajouter une ligne de mission : <span class="accent">{{ $mission->title }}</span></h1>

        <form action="{{ route('missionLines.store', $mission) }}" method="POST">
            @csrf
            <div class="text">
                <label for="title">Titre : </label>
                <input type="text" value="{{ old('title') }}" placeholder="Titre" id="title" name="title">
                @error ('title')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <label for="quantity">Quantité : </label>
                <input type="number" value="{{ $quantity = old('quantity') }}" placeholder="Quantité" id="quantity" name="quantity">
                @error ('quantity')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <label for="unit-price">Prix unitaire : </label>
                <input type="text" value="{{ $unitPrice = old('unit_price') }}" placeholder="Prix unitaire" id="unit-price" name="unit_price">
                @error ('unit_price')
                <div class="invalid"> {{ $message }}</div>
                @enderror
                <div class="submit">
                    <input type="submit" value="Ajouter la ligne de mission">
                </div>
            </div>

            <input type="hidden" value="{{ $quantity * $unitPrice }}" placeholder="Total TTC" id="total-ttc" name="total_ttc">

        </form>
    </div>
@endsection
