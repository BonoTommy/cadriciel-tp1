<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset("css/app.css")}}" />
</head>
<body class="bg-dark vh-100">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
        <div class="container">
            <a href="#" class="navbar-brand">Maisonneuve-e2295815</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('etudiants.index') }}" class="nav-link">Liste des étudiants</a>
                    </li>
                     <li class="nav-item">
                        <a href="{{ route('etudiants.create') }}" class="nav-link">Ajouter un étudiant</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="bg-dark text-light p-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div class="me-5">
                    <h1>Cadriciel <span class="text-success">TP1</span></h1>
                    <p class="lead my-4">Le mandat est de créer un site Internet pour recueillir de l'information auprès des étudiants du Collège Maisonneuve, et possiblement à l'avenir, de construire un réseau social pour eux.</p>
                    <a href="{{route('etudiants.index')}}" class="btn bg-success btn-lg">Liste des étudiants</a>
                </div>
                <img class="img-fluid w-50 d-none d-sm-block" src="./img/banniere-profile.svg" alt="">
            </div>
        </div>
    </section>
</body>
</html>