@extends('layout')

@section('content')

    <main class="login-form">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h1 class="card-header text-center">Connexion</h1>

                    <div class="card-body">
                        <form action="{{ route('auth.authentication') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" value="{{ old('email') }}" placeholder="Email" id="email" name="email" class="form-control @error('email')is-invalid @enderror">
                                @error ('email')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Mot de passe" id="password" name="password" class="form-control @error('password')is-invalid @enderror">
                                @error ('password')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Se connecter</button>
                            </div>
                            <div class="bottom my-3 text-center">
                                <a href="{{ route('password.forgot') }}" title="Mot de passe oublié" class="passwordForgotten">Mot de passe oublié</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
