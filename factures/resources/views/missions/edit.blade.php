@extends('layout')

@section('content')
    <div class="divPage divMissions edit">
        <h1>Modifier : {{ $mission->name }}</h1>

        <form action="{{ route('missions.update', $mission) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="text">
                <label for="title">Titre : </label>
                <input type="text" value="{{ $mission->title }}" placeholder="Titre" id="title" name="title">
                @error ('title')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <label for="reference">Référence : </label>
                <input type="text" value="{{ $mission->reference }}" placeholder="Référence" id="reference" name="reference">
                @error ('reference')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="text">
                <label for="advance">Acompte : </label>
                <input type="text" value="{{ $mission->advance }}" placeholder="Acompte" id="advance" name="advance">
                @error ('advance')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
            <div class="submit">
                <input type="submit" value="Modifier la mission">
            </div>
        </form>

    </div>
@endsection
