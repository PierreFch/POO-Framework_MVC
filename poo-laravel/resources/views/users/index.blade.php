@extends('layout')

@section('content')

<div class="container my-4">
    <h1>Utilisateurs</h1>

    <ul>
        @foreach($users as $user)
            <li>
                <div class="top"><img src="{{ $user->avatar_url }}" alt=""/></div>
                <div class="bottom">
                    {{ $user->name }}
                    {{ $user->email }} <br>
                    <a href="user/{{$user->id}}">Voir plus</a>
                </div>
            </li>
        @endforeach
    </ul>
</div>

@endsection

