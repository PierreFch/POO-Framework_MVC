<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Génération de devis et de factures en ligne.</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Style -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="{{ asset('data/css/main.css') }}">

</head>
<body>
<header>

    @auth()
        <div class="banner">
            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="error">
                    {{ session('error') }}
                </div>
            @endif
            <div class="logout">
                <a href="{{ route('users.logout') }}" title="Se déconnecter" class="button">Se déconnecter</a>
            </div>

        </div>
    @endauth
</header>

<div class="container">
    @if (session('not-allowed'))
        <div class="alert">
            {{ session('not-allowed') }}
        </div>
    @endif
    <div class="Page">
        @if(Auth::user())
            <div class="left">
                <nav>
                    <ul>
                        <div class="top">
                            <li>
                                <a href="{{ route('clients.index') }}" title="Mes clients">
                                    <img src="{{ asset('data/images/clients.svg') }}" alt="Clients"
                                         title="Mes clients"/>
                                    Mes clients</a>
                            </li>
                        </div>
                        <div class="bottom">
                            <li>
                                <a href="{{ route('users.index') }}" title="Mon compte" class="account">
                                    <img src="{{ asset('data/images/user.svg') }}" alt="Account" title="Mon compte"/>
                                    Mon compte</a>
                            </li>
                        </div>
                    </ul>
                </nav>
            </div>
            <div class="right">
                @yield('content')
            </div>
            @else
                @yield('content')
        @endif
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="{{ asset('data/js/specifics.js') }}"></script>

</body>
</html>
