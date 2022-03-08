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
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text my-3 col">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="text my-3 col">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ $user->password }}">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text my-3 col">
                    <label for="avatar_url">Photo de profil :</label>
                    <input type="text" id="avatar_url" name="avatar_url" class="form-control @error('avatar_url') is-invalid @enderror" value="{{ $user->avatar_url }}">
                    @error('avatar_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <input class="btn btn-primary" type="submit" id="submit" value="Modifier l'utilisateur">
        </form>
    </div>

@endsection
