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
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
        <div class="container">
            <a href="{{route('accueil')}}" class="navbar-brand">Maisonneuve-e2295815</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('accueil')}}" class="nav-link">Accueil</a>
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
                    <h1 class="text-success">@yield('h1')</h1>
                </div>
            </div>
        </div>
    </section>
  

    <div class="container-fluid">
        @if (session('success'))
        <div class="row justify-content-center mt-1 mb-1">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}
                <div class="btn-close" type="button" data-bs-dismiss="alert" aria-label="close"></div></div>
            </div>
        </div>
        @endif
        @yield('content')
    </div>    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>
