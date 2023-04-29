@extends('layouts.app')
@section('title', 'Blog - Welcome')
@section('h1', __('lang.title_blog'))
@section('content')
    <div class="row">
        <div class="col-12 text-center pt-3">
            <h1 class="display-3 mt-3">
                @lang('lang.h1_index')
            </h1>
        </div>
        <hr>
        <div class="col-md-8">
            <p>
                @lang('lang.enjoy')
            </p>
        </div>
        <div class="col-md-4">
            <a href="{{ route('blog.create' )}}" class="btn btn-success">@lang('lang.link_create')</a>
            <a href="{{ route('blog.myPosts')}}" class="btn btn-warning">@lang('lang.link_myposts')</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <ul class="blog-index">
            @forelse($blogs as $blog)
                <li>
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('blog.show', $blog->id)}}">{{ $blog->title }}</a> @lang('lang.by') {{ $blog->blogHasEtudiant->nom }}
                    </div>
                    <div class="card-body">
                        {{ $blog->body }}
                    </div>
                    <div class="card-footer">
                        {{$blog->created_at}}
                    </div>
                </div> </li>
            @empty
                <li class="text-danger">@lang('lang.no_blog')</li>
            @endforelse
            </ul>
        </div>
    </div>
@endsection