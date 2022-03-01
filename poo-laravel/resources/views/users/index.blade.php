@extends('layout')

@section('content')

<div class="my-4">
    <h1>Liste des utilisateurs</h1>

    <ul>
        @foreach($users as $user)
            <li>
                <div class="top"><img src="{{ $user->avatar_url }}" alt=""/></div>
                <div class="bottom">
                    {{ $user->name }}
                    {{ $user->email }} <br>
                    <a href="{{route('users.show', $user)}}" class="btn btn-primary mt-3 my-1">Voir plus</a>
                    <a href="{{route('users.edit', $user)}}" class="btn btn-warning my-1">Modifier l'utilisateur</a>
                </div>
            </li>
        @endforeach
    </ul>
</div>

@endsection

