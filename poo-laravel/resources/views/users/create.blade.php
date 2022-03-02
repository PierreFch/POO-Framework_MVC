@extends('layout')

@section('content')

    <h1>Ajouter un utilisateur</h1>

    <form action="{{route('users.store')}}" method="POST" class="my-3">
        @csrf
        <div class="form-row">
            <div class="text my-3 col">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="text my-3 col">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="text my-3 col">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="text my-3 col">
                <label for="avatar_url">Photo de profil :</label>
                <input type="text" id="avatar_url" name="avatar_url" class="form-control @error('avatar_url') is-invalid @enderror">
                @error('avatar_url')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <input class="btn btn-primary" type="submit" id="submit" value="Ajouter l'utilisateur">
    </form>

@endsection
