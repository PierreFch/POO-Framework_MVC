@extends('layout')

@section('content')
    <div class="divPage divWelcome">
        <div class="button">
            <a href="{{ route('user.login') }}" title="Se connecter avec GitHub" class="login">Se connecter avec GitHub</a>
        </div>
    </div>
@endsection
