@extends('layouts.app')
@section('title', 'Etudiant - Edit')
@section('h1', 'Modifier l\'étudiant(e) ' . $etudiant->nom)
@section('content')

        <div class="row justify-content-center">
            <div class="col-md-6">
            <a href="{{ route('etudiants.index') }}" class="btn btn-primary btn-sm my-3">Retour</a>
            @if(count($errors->get('title')) > 0)
                <div class="text-sm text-danger">La version anglaise est obligatoire</div>
            @endif
                <div class="card">
                    <form method="post">
                    @csrf
                    @method('PUT')
                        <div class="card-header">
                            Formulaire de modification d'un étudiant
                        </div>
                        <div class="card-body">   
                            <div class="control-group col-12">
                                <label for="nom">Nom</label>
                                <input type="text" id="nom" name="nom" class="form-control" value="{{ $etudiant->nom }}">
                                @error('nom')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12">
                                <label for="date_de_naissance">Date de naissance</label>
                                <input type="text" class="form-control" id="date_de_naissance" name="date_de_naissance" value="{{ $etudiant->date_de_naissance }}">
                                @error('date_de_naissance')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ $etudiant->email }}">
                                @error('email')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12">
                                <label for="phone">Telephone</label>
                                <input type="tel" id="phone" name="phone" class="form-control" value="{{ $etudiant->phone }}">
                                @error('phone')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12">
                                <label for="adresse">Adresse</label>
                                <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $etudiant->adresse }}">
                                @error('adresse')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12">
                                <label for="nom">Nom</label>
                                <select id="ville_id" name="ville_id" class="block w-full mt-1 rounded-md" multiple>
                                    @foreach($villes as $ville)
                                        <option value="{{ $ville->id }}" {{ $etudiant->ville_id == $ville->id ? 'selected' : ''}}>{{ $ville->nom }}</option>
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
@endsection