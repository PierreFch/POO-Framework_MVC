<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Liste des users</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body">
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link mr-5" href="<?= url('users'); ?>">Liste des utilisateurs</a>
                <a class="nav-item nav-link" href="<?= url('users/add'); ?>">Ajouter un utilisateur</a>
            </div>
        </div>
    </nav>
</header>

@yield('content')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<style>

    h1 {
        font-size: 2.8em;
    }

    ul {
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        padding-left: 0;
    }

    ul li {
        list-style: none;
        display: flex;
        flex-direction: column;
        width: calc(25% - 40px);
        margin: 20px;
        background: #FFF;
        box-shadow: 0 8px 10px 0 #D6D6D6;
    }

    ul li img {
        width: 100%;
    }

    ul li div.bottom {
        padding: 20px;
    }

    body {
        font-family: 'Nunito', sans-serif;
        font-size: 1em;
    }

    div.container {
        max-width: 1380px;
        width: 96%;
        margin: auto;
        padding: 0 20px;
    }

</style>
</body>
</html>
