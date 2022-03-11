@extends('layout')

@section('content')

    <h1>Tableau de bord</h1>
    <h2>Liste des utilisateurs</h2>
    <div class="dashboard">
        <ul class="row">
            @foreach($users as $user)
                <li class="col-3">
                    <div class="top"><img src="{{ $user->avatar_url }}" alt=""/></div>
                    <div class="bottom">
                        <div class="name">{{ $user->name }}</div>
                        <div class="email">{{ $user->email }}</div>
                    </div>
                    <div class="actions">
                        <div class="edit">
                            <a href="{{route('users.edit', $user)}}" class="btn btn-warning my-1">Modifier l'utilisateur</a>
                        </div>
                        <div class="delete">
                            <form action="{{route('users.destroy', $user)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" id="destroy" name="destroy" value="Supprimer l'utilisateur"
                                       class="btn btn-danger">
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
