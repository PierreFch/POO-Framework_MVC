@extends('layout')

@section('content')

    <div class="my-4">
        <h1>Modifier l'utilisateur</h1>

        <form action="{{route('users.update', $user)}}" method="POST" class="my-3">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="text my-3 col">
                    <label for="name">Nom :</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="text my-3 col">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>
            </div>
            <div class="form-row">
                <div class="text my-3 col">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" class="form-control" value="{{ $user->password }}">
                </div>
                <div class="text my-3 col">
                    <label for="avatar_url">Photo de profil :</label>
                    <input type="text" id="avatar_url" name="avatar_url" class="form-control" value="{{ $user->avatar_url }}">
                </div>
            </div>
            <input class="btn btn-primary" type="submit" id="submit" value="Modifier l'utilisateur">
        </form>
    </div>

@endsection
