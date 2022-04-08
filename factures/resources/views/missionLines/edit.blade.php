@extends('layout')

@section('content')
    <div class="divPage divMissionLines edit">
        <h1>Modifier une ligne de mission</h1>
        <h2>{{ $mission->title }}</h2>

        <form action="{{ route('missionLines.update', $mission) }}" method="POST">
            @csrf
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
            </div>
            <div class="text">
                <label for="total-ttc">Total TTC : </label>
                <input type="text" value="{{ $missionLine->quantity * $missionLine->unit_price }}" placeholder="Total TTC" id="total-ttc" name="total_ttc">
                @error ('total_ttc')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>

            <div class="submit">
                <input type="submit" value="Modifier la ligne de mission">
            </div>
        </form>
    </div>
@endsection
