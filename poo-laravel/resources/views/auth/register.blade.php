@extends('layout')

@section('content')

    <main class="register-form">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h1 class="card-header text-center">Register User</h1>
                    <div class="card-body">
                        <form action="{{ route('auth.registration') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" value="{{ old('name') }}" placeholder="Name" id="name" name="name" class="form-control @error ('name')is-invalid @enderror">
                                @error ('name')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" value="{{ old('email') }}" placeholder="Email" id="email" name="email" class="form-control @error ('email')is-invalid @enderror">
                                @error ('email')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" name="password" class="form-control @error ('password')is-invalid @enderror">
                                @error ('password')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Confirm password" id="password_confirmation" name="password_confirmation" class="form-control @error ('password-confirmation')is-invalid @enderror">
                                @error ('password_confirmation')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
