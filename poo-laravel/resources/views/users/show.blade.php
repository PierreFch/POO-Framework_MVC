@extends('layout')

@section('content')

    <div class="my-4">
        <div class="left">
            <img src="{{ $user->avatar_url }}" alt="" title=""/>
        </div>
        <div class="right">
            <h1>{{ $user->name }}</h1>
            <h2>{{ $user->email }}</h2>
            <div class="bottom d-flex justify-content-between align-items-start mt-4">
                <a href="<?= url('/users'); ?>" title="">Retour à la liste</a>
                    <a href="{{route('users.edit', $user)}}" class="btn btn-warning my-1">Modifier l'utilisateur</a>
            </div>
            <form action="{{route('users.destroy', $user)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" id="destroy" name="destroy" value="Supprimer l'utilisateur" class="btn btn-danger">
            </form>
        </div>
    </div>

@endsection
