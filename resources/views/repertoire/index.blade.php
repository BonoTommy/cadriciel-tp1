@extends('layouts.app')
@section('title', 'Repertoire - Liste')
@section('h1', __('lang.title_directory'))
@section('content')
<div class="container">
    <div class="row">
            <div class="d-flex my-3">
                <a href="{{ route('repertoire.create') }}" class="px-4 py-2 btn text-white bg-success">@lang('lang.btn_add_file')</a>
                <a href="{{ route('repertoire.myDocs') }}" class="px-4 py-2 mx-3 btn text-white bg-warning">@lang('lang.link_mydocs')</a>
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
                                <td scope="col">
                                    <a href="{{ '/storage/'.$repertoire->file }}" target="_blank" class="btn btn-warning btn-sm mx-2">@lang('lang.btn_download')</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
            {{$repertoires}}
</div>
@endsection