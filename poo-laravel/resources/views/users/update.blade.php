@extends('layout')

@section('content')

    <h1>Update un utilisateur</h1>

    <form action="/update" method="POST" class="my-3">
        @csrf
        <div class="form-row">
            <div class="text my-3 col">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="text my-3 col">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
        </div>
        <div class="text my-3">
            <label for="picture">Photo de profil :</label>
            <input type="text" id="picture" name="picture" class="form-control">
        </div>
        <input class="btn btn-primary" type="submit" id="submit" value="Ajouter l'utilisateur">
    </form>

@endsection
