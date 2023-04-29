@extends('layouts.app')
@section('title', 'Blog - Modifier')
@section('h1', __('lang.title_blog'))
@section('content')
    <div class="row">
        <div class="col-12 text-center pt-2">
            <h1 class="display-5">
                @lang('lang.h1_edit')
            </h1>
        </div> <!--/col-12-->
    </div><!--/row-->
            <hr>
    <div>
        <a href="{{ route('blog.index')}}" class="btn btn-primary btn-sm my-3" >@lang('lang.link_blog')</a>
        <a href="{{ route('blog.show', $blogPost->id)}}" class="btn btn-primary btn-sm my-3" >@lang('lang.btn_back')</a>

    </div>
    <div class="row justify-content-center">
        @if(count($errors->get('title')) > 0 || count($errors->get('body')) > 0)
            <div class="text-sm text-danger">Le formulaire anglais doit obligatoirement être complété</div>
        @endif
        <div class="col-md-6">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-en-tab" data-bs-toggle="tab" data-bs-target="#nav-en" type="button" role="tab" aria-controls="nav-en" aria-selected="true">English</button>
                    <button class="nav-link" id="nav-fr-tab" data-bs-toggle="tab" data-bs-target="#nav-fr" type="button" role="tab" aria-controls="nav-fr" aria-selected="false">Français</button>
                </div>
            </nav>
            <form method="post">
            @csrf
            @method('put')
                <div class="tab-content border border-top-0 rounded-bottom p-3 pb-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-fr" role="tabpanel" aria-labelledby="nav-fr-tab">
                        <div class="control-group col-12">
                            <label for="title_fr">Titre de l'article</label>
                            <input type="text" id="title_fr" name="title_fr" class="form-control" value="{{ $blogPost->title_fr }}">
                            @error('title_fr')
                                <div class="text-sm text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="control-group col-12 mt-3">
                            <label for="body_fr">Article</label>
                            <textarea rows="4" class="form-control" id="body_fr" name="body_fr">{{ $blogPost->body_fr }}</textarea>
                            @error('body_fr')
                                <div class="text-sm text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-en" role="tabpanel" aria-labelledby="nav-en-tab"> 
                        <div class="control-group col-12">
                            <label for="title">Post Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ $blogPost->title }}">
                            @error('title')
                                <div class="text-sm text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="control-group col-12 mt-3">
                            <label for="message">Post</label>
                            <textarea rows="4" class="form-control" id="message" name="body">{{ $blogPost->body}}</textarea>
                            @error('body')
                                <div class="text-sm text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="text-left mt-3">
                    <input type="submit" class="btn btn-success" value=@lang('lang.btn_submit')>
                </div>
            </form>
        </div>    
    </div>
        
@endsection