@extends('layouts.app')
@section('title', 'Repertoire - MyDocs')
@section('h1', __('lang.title_directory'))
@section('content')
<div class="container">
    <div class="row">
            <div class="d-flex my-3">
                <a href="{{ route('repertoire.create') }}" class="px-4 py-2 btn text-white bg-success">Nouveau document</a>
            </div>
        <div class="w-full table-responsive">
            <table class="w-full table table-striped border small-fs">
                    <thead class="bg-primary">
                        <tr>
                            <th scope="col">@lang('lang.col_dir_name')</th>
                            <th scope="col">@lang('lang.col_dir_author')</th>
                            <th scope="col">@lang('lang.col_dir_date')</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($repertoires as $repertoire)
                            <tr>
                                <td scope="row">{{ $repertoire->title }}</td>
                                <td scope="row">{!! $repertoire->repertoireHasEtudiant->nom !!}</td>
                                <td>{{ $repertoire->created_at }}</td>
                                <td>
                                    <a href="{{ route('repertoire.edit', $repertoire->id) }}" class="btn btn-success btn-sm mx-2">@lang('lang.btn_edit')</a>
                                    <input type="button" class="btn btn-danger btn-sm mx-2" data-bs-toggle="modal" data-bs-target="#modalDelete" value=@lang('lang.btn_delete')>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
        {{-- @empty
        <div class="col-12">
            Il n'y a pas de documents
        </div> --}}
    </div>
            {{$repertoires}}

    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer l'étudiant : {{ $repertoire->title }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.btn_close')</button>
                <form method="POST" action="{{ route('repertoire.delete', $repertoire->id) }}" >
                    @csrf
                    @method('DELETE')
                        <input type=submit class="btn btn-danger" value=@lang('lang.btn_delete')>
                    </form>
            </div>
            </div>
        </div>
    </div>      
</div>


@endsection