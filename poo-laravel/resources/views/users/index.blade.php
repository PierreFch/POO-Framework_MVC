@extends('layout')

@section('content')

<div class="my-4">
    <h1>Liste des utilisateurs</h1>

    <ul class="d-flex flex-wrap align-items-start pl-0">
        @foreach($users as $user)
            <li class="col-3 d-flex flex-column">
                <div class="top"><img src="{{ $user->avatar_url }}" alt=""/></div>
                <div class="bottom">
                    <div class="name">{{ $user->name }}</div>
                    <div class="email">{{ $user->email }}</div>
                    <a href="{{route('users.show', $user)}}" class="showmore btn btn-primary mt-3 my-1">Voir plus</a>
                </div>
            </li>
        @endforeach
    </ul>
</div>

@endsection

