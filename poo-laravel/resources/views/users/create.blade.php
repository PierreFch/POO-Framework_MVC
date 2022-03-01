@extends('layout')

@section('content')

    <h1>Ajouter un utilisateur</h1>

    <form action="{{route('users.store')}}" method="POST" class="my-3">
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
        <div class="form-row">
            <div class="text my-3 col">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="text my-3 col">
                <label for="avatar_url">Photo de profil :</label>
                <input type="text" id="avatar_url" name="avatar_url" class="form-control">
            </div>
        </div>
        <input class="btn btn-primary" type="submit" id="submit" value="Ajouter l'utilisateur">
    </form>

@endsection
