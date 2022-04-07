@extends('layout')

@section('content')
    <div class="divPage divDevis">
        <a href="{{ route('dashboard') }}" title="Retour en arrière" class="back">
            <img src="{{ asset('data/images/back.png') }}" alt="back" title="Retour en arrière"/>
            Retour en arrière
        </a>
        <h1>Générer un devis</h1>
        <form action="" method="POST">
            <input type="hidden" value="" name="client_id">
            <input type="hidden" value="" name="mission_id">

            <h2>Informations</h2>
                <div class="text">
                    <input type="text" value="{{ old('title') }}" placeholder="Titre" id="title'" name="title'">
                    @error ('title')
                    <div class="invalid"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="text">
                    <input type="text" value="{{ old('reference') }}" placeholder="Référence" id="reference'" name="reference'">
                    @error ('reference')
                    <div class="invalid"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="text">
                <input type="text" value="{{ old('accompte') }}" placeholder="Accompte" id="accompte'" name="accompte'">
                @error ('accompte')
                <div class="invalid"> {{ $message }}</div>
                @enderror
            </div>
{{--            <h2>Tâches</h2>--}}
{{--                <div class="text">--}}
{{--                    <input type="text" value="{{ old('mission_line_title') }}" placeholder="Titre de la tâche" id="mission-line-title'" name="mission_line_title'">--}}
{{--                    @error ('mission_line_title')--}}
{{--                    <div class="invalid"> {{ $message }}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="text">--}}
{{--                    <input type="text" value="{{ old('quantity') }}" placeholder="Quantité" id="quantity'" name="quantity'">--}}
{{--                    @error ('quantity')--}}
{{--                    <div class="invalid"> {{ $message }}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="number">--}}
{{--                    <input type="number" value="{{ old('accompte') }}" placeholder="Accompte" id="accompte'" name="accompte'">--}}
{{--                    @error ('accompte')--}}
{{--                    <div class="invalid"> {{ $message }}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div class="number">--}}
{{--                <input type="number" value="{{ old('unit_price') }}" placeholder="Prix unitaire" id="unit-price'" name="unit_price'">--}}
{{--                @error ('unit_price')--}}
{{--                <div class="invalid"> {{ $message }}</div>--}}
{{--                @enderror--}}
{{--            </div>--}}
{{--                <a class="submit" title="Ajouter la tâche">Ajouter</a>--}}

{{--            <h3>Liste des tâches</h3>--}}
{{--            <ul>--}}
{{--                @foreach($tasks as $task)--}}
{{--                    <li>--}}
{{--                        <span>{{ $task->title }}</span>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}


            <div class="submit">
                <input type="submit" value="Générer">
            </div>
        </form>

        <form action="" method="POST">

        </form>
    </div>
@endsection
