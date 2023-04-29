<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    {{-- <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
        rel="stylesheet"
    /> --}}
    <link rel="stylesheet" href="{{ asset("css/app.css")}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="bg-dark vh-100">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
        <div class="container">
            <a href="{{route('accueil')}}" class="navbar-brand">Maisonneuve-e2295815</a>
            @if(Auth::user())
            <span class="text-white">@lang('lang.text_hello') {{ Auth::user()->name }}</span>
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ms-auto primary-menu">
                @guest
                    <li class="nav-item">
                        <a href="{{ route('accueil')}}" class="nav-link">@lang('lang.link_home')</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('etudiants.create') }}" class="nav-link">@lang('lang.link_student_register')</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login')}}" class="nav-link">@lang('lang.link_login')</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('etudiants.index') }}" class="nav-link">@lang('lang.link_student')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('blog.index')}}">@lang('lang.link_blog')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('repertoire.index')}}">@lang('lang.link_file')</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">@lang('lang.link_logout')</a>
                    </li>
                @endguest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('lang', 'fr')}}">Français <i class="flag flag-france"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('lang', 'en')}}">English <i class="flag flag-us"></i></a>
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
                    <p class="lead my-4">@lang('lang.mandate')</p>
                    <a href="{{route('etudiants.index')}}" class="btn bg-success btn-lg">@lang('lang.link_student')</a>
                </div>
                <img class="img-fluid w-50 d-none d-sm-block" src="./img/banniere-profile.svg" alt="">
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>