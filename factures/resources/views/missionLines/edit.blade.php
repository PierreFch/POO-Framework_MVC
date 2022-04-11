@extends('layout')

@section('content')
    <div class="divPage divMissionLines edit">
        <h1>Modifier : {{ $missionLine->title }}</h1>

        <form action="{{ route('missionLines.update', $missionLine) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="text">
                <label for="title">Titre : </label>
                <input type="text" value="{{ $missionLine->title }}" placeholder="Titre" id="title" name="title">
                @error ('title')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <label for="quantity">Quantité : </label>
                <input type="number" value="{{ $missionLine->quantity }}" placeholder="Quantité" id="quantity" name="quantity">
                @error ('quantity')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <label for="unit-price">Prix unitaire : </label>
                <input type="text" value="{{ $missionLine->unit_price }}" placeholder="Prix unitaire" id="unit-price" name="unit_price">
                @error ('unit_price')
                <div class="invalid"> {{ $message }}</div>
                @enderror
                <div class="submit">
                    <input type="submit" value="Modifier la ligne de mission">
                </div>
            </div>

            <input type="hidden" value="{{ $missionLine->total_ttc }}" placeholder="Total TTC" id="total-ttc" name="total_ttc">

        </form>
    </div>
@endsection
