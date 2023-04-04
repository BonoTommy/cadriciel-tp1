@extends('layouts.app')
@section('title', 'Etudiant - Show')
@section('h1', 'Details de l\'étudiant(e) ' . $etudiant->nom)
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <a href="{{ route('etudiants.index') }}" class="btn btn-primary btn-sm mb-3">Retour</a>
            <div class="card">
                <div class="card-header">
                    <h2 class="display-8 pt-3">{{ $etudiant->nom }}</h2>
                </div>
                <div class="card-body">
                    <dl>
                        <dt>Date de Naissance :</dt><dd> {{ $etudiant->date_de_naissance }}</dd>
                        <dt>Email :</dt><dd> {{ $etudiant->email }}</dd>
                        <dt>Numéro de téléphone :</dt><dd> {{ $etudiant->phone }}</dd>
                        <dt>Adresse :</dt><dd> {{ $etudiant->adresse }}</dd>
                        <dt>Ville :</dt><dd> {{ $etudiant->etudiantHasVille->nom }}</dd>
                    </dl>
                </div>
                <div class="card-footer">
                    <div class="row text-center">
                        <div class="col-md-6">
                            <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-success btn-sm">Modifier</a>
                        </div>
                        <div class="col-md-6">
                            <input type=button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete" value="Effacer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <hr>
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer l'étudiant : {{ $etudiant->nom }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form method="POST">
                    @csrf
                    @method('DELETE')
                        <input type=submit class="btn btn-danger" value="Effacer">
                    </form>
            </div>
            </div>
        </div>
    </div>
</div>  
@endsection