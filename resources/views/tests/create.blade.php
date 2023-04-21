@extends('layouts.app')
@section('title', 'test - Create')
@section('h1', 'Ajouter un test')
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
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" value={{old('name')}}>
                                @error('name')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12 mt-3">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control" value='{{old('email')}}'>
                                @error('email')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12 mt-3">
                                <label for="date">Date de naissance</label>
                                <input type="text" class="form-control" id="date" name="date" placeholder="dd-mm-yyyy" value="{{old('date')}}">
                                @error('date')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12 mt-3">
                                <label for="unite">Unite</label>
                                <input type="number" step="1" id="unite" name="unite" class="form-control" value="{{old('unite')}}">
                                @error('unite')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12 mt-3">
                                <label for="unite_kg">Teleunite_kg</label>
                                <input type="number" step="0.01" id="unite_kg" name="unite_kg" class="form-control" value="{{old('unite_kg')}}">
                                @error('unite_kg')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12 mt-3">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" value="{{old('password')}}">
                                @error('password')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12 mt-3">
                                <label for="password_confirmation">Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="{{old('password_confirmation')}}">
                                @error('password')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group col-12 mt-3">
                                <label for="ville_id">Ville</label>
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