@extends('layouts.app')
@section('title', 'Repertoire - Create')
@section('h1', 'Ajouter un nouveau document')
@section('content')
<div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                    Ajouter un document
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-fr-tab" data-bs-toggle="tab" data-bs-target="#nav-fr" type="button" role="tab" aria-controls="nav-fr" aria-selected="true">Français</button>
                        <button class="nav-link" id="nav-en-tab" data-bs-toggle="tab" data-bs-target="#nav-en" type="button" role="tab" aria-controls="nav-en" aria-selected="false">English</button>
                    </div>
                </nav>
                <form method="post" enctype="multipart/form-data">
                @csrf
                    <div class="tab-content border border-top-0 rounded-bottom p-3 pb-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-fr" role="tabpanel" aria-labelledby="nav-fr-tab">
                            <div class="control-group col-12">
                                <label for="title_fr">Nom du document</label>
                                <input type="text" id="title_fr" name="title_fr" class="form-control" >
                                @error('title_fr')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                            <div class="card mt-4">
                                <div class="card-header">
                                    Add a File Form
                                </div>
                                <div class="card-body">   
                                    <div class="control-group col-12">
                                        <label for="title">File Name</label>
                                        <input type="text" id="title" name="title" class="form-control" >
                                        @error('title')
                                            <div class="text-sm text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group col-12">
                            <label for="file">File</label>
                            <input type="file" class="btn btn-success" id="file" name="file">
                            @error('file')
                                <div class="text-sm text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-left mt-3">
                            <input type="submit" class="btn btn-success" value="Soumettre">
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection