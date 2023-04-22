@extends('layouts.app')
@section('title', 'Repertoire - Liste')
@section('h1', 'Liste des documents')
@section('content')
<div class="container">
    <div class="row">
            <div class="d-flex my-3">
                <a href="{{ route('repertoires.create') }}" class="px-4 py-2 btn text-white bg-success">Nouveau document</a>
            </div>
        <div class="w-full table-responsive">
            <table class="w-full table table-striped border small-fs">
                    <thead class="bg-primary">
                        <tr>
                            <th scope="col">Nom du document</th>
                            <th scope="col">Publié par</th>
                            <th scope="col">Document</th>
                            <th scope="col">Date d'ajout</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($repertoires as $repertoire)
                            <tr>
                                <td scope="row">{{ $repertoire->title }}</td>
                                <td scope="row">{!! $repertoire->repertoireHasEtudiant->nom !!}</td>
                                <td>{{ $repertoire->file }}</td>
                                <td>{{ $repertoire->created_at }}</td>
                                <td>
                                    <div class="mr-3">
                                        <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-success btn-sm">Modifier</a>
                                    </div>
                                    <div class="mr-3">
                                        <input type=button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete" value="Effacer">
                                    </div>
                                </td>
                            </tr>
                        @endforeach  
                    </tbody>
            </table>
            {{$repertoires}}
        </div>
    </div>
</div>
@endsection