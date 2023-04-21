@extends('layouts.app')
@section('title', 'Blog - Create')
@section('content')
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                    Ajouter un article
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
                <form method="post">
                @csrf
                    <div class="tab-content border border-top-0 rounded-bottom p-3 pb-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-fr" role="tabpanel" aria-labelledby="nav-fr-tab">
                             
                            <div class="control-group col-12">
                                <label for="title_fr">Titre de l'article</label>
                                <input type="text" id="title_fr" name="title_fr" class="form-control" >
                            </div>
                            <div class="control-group col-12 mt-3">
                                <label for="body_fr">Article</label>
                                <textarea rows="4" class="form-control" id="body_fr" name="body_fr"></textarea>
                            </div>
                                
                        </div>
                        <div class="tab-pane fade" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab">
                            <div class="card mt-4">
                                <div class="card-header">
                                    Add a Post Form
                                </div>
                                <div class="card-body">   
                                    <div class="control-group col-12">
                                        <label for="title">Post Title</label>
                                        <input type="text" id="title" name="title" class="form-control" >
                                    </div>
                                    <div class="control-group col-12 mt-3">
                                        <label for="message">Message</label>
                                        <textarea rows="4" class="form-control" id="message" name="body"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-left mt-3">
                            <input type="submit" class="btn btn-success" value="Soumettre">
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection