@extends('layouts.app')
@section('title', 'Etudiant - Liste')
@section('h1', 'Liste des étudiants')
@section('content')
<div class="container">
    <div class="row">
            <div class="d-flex my-3">
                <a href="{{ route('etudiants.create') }}" class="px-4 py-2 btn text-white bg-success">Nouvel Étudiant</a>
            </div>
        <div class="w-full table-responsive">
            <table class="w-full table table-striped border small-fs">
                    <thead class="bg-primary">
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Date de naissance</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telephone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etudiants as $etudiant)
                            <tr>
                                <td scope="row"><a href="{{ route('etudiants.show', $etudiant->id) }}">{{ $etudiant->nom }}</a></td>
                                <td>{{ $etudiant->date_de_naissance }}</td>
                                <td>{{ $etudiant->email }}</td>
                                <td>{{ $etudiant->phone }}</td>
                            </tr>
                        @endforeach  
                    </tbody>
            </table>
            {{$etudiants}}
        </div>
    </div>
</div>
@endsection