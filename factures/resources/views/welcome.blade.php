@extends('layout')

@section('content')
    <div class="divPage divWelcome">
        <a href="{{ route('users.login') }}" title="Se connecter avec GitHub" class="login">Se connecter avec GitHub</a>
    </div>
@endsection
