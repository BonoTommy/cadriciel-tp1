@extends('layouts.app')
@section('title', 'Etudiant - Create')
@section('h1', 'Ajouter un nouvel étudiant')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('etudiants.index') }}" class="btn btn-primary btn-sm my-3">Retour</a>
                <div class="card mb-3">
                    <form method="post">
                    @csrf
                        <div class="card-header">
                            Formulaire d'ajout d'un étudiant
                        </div>
                        <div class="card-body">   
                            <div class="control-group col-12 ">
                                <label for="nom">Nom</label>
                                <input type="text" id="nom" name="nom" class="form-control" placeholder="prénom nom">
                                @error('nom')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12 mt-3">
                                <label for="date_de_naissance">Date de naissance</label>
                                <input type="text" class="form-control" id="date_de_naissance" name="date_de_naissance" placeholder="dd-mm-yyyy">
                                @error('date_de_naissance')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12 mt-3">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control">
                                @error('email')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12 mt-3">
                                <label for="phone">Telephone</label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="(###) ###-####">
                                @error('phone')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12 mt-3">
                                <label for="adresse">Adresse</label>
                                <input type="text" id="adresse" name="adresse" class="form-control">
                                @error('adresse')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12 mt-3">
                                <label for="nom">Ville</label>
                                <select id="ville_id" name="ville_id" class="block w-full mt-1 rounded-md">
                                    @foreach($villes as $ville)
                                        <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                                    @endforeach
                                </select>
                                @error('ville_id')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                                
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-success" value="Soumettre">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection