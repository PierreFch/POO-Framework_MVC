@extends('layout')

@section('content')

    <main class="passwordForgotten-form">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h1 class="card-header text-center">Mot de passe oublié</h1>
                    <div class="card-body">
                        <p>Merci de renseigner votre adresse mail. <br>
                            Un lien pour changer votre mot de passe vous sera envoyé.</p>
                        <form action="{{ route('password.sendEmail') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" name="email"
                                       class="form-control @error('email')is-invalid @enderror">
                                @error ('email')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
