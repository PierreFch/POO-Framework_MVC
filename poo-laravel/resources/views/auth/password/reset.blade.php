@extends('layout')

@section('content')

    <main class="passwordReset-form">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h1 class="card-header text-center">Changement mot de passe</h1>
                    <p>Entrez votre nouveau mot de passe.</p>
                    <div class="card-body">
                        <form action="{{ route('password.update', $token) }}" method="POST">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Nouveau mot de passe" id="password" name="password"
                                       class="form-control @error('password')is-invalid @enderror">
                                @error ('password')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Confirmation mot de passe" id="confirm-password" name="confirm-password"
                                       class="form-control @error('confirm-password')is-invalid @enderror">
                                @error ('confirm-password')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Changer mot de passe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
