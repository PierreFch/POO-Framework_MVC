@include('layout')


    <h1>Inscription</h1>

    <form action="{{ route('auth.registration') }}" method="POST">
        @csrf
        <div>
            <input type="text" value="{{ old('name') }}" placeholder="Nom" id="name" name="name"
                   class="form-control @error ('name')is-invalid @enderror">
            @error ('name')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>
        <div>
            <input type="email" value="{{ old('email') }}" placeholder="Email" id="email" name="email"
                   class="form-control @error ('email')is-invalid @enderror">
            @error ('email')
            <div class="invalid-feedback"> {{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">S'inscrire</button>
        </div>
    </form>
