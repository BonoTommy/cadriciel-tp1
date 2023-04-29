@extends('layouts.app')
@section('title', 'Blog - My posts')
@section('h1', __('lang.title_blog'))
@section('content')
    <div class="row">
        <div class="col-12 text-center pt-3">
            <h1 class="display-3 mt-3">
                @lang('lang.h1_myposts')
            </h1>
        </div>
        <hr>
        <div class="col-md-4">
            <a href="{{ route('blog.index')}}" class="btn btn-primary btn-sm my-3" >@lang('lang.btn_back')</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('blog.create' )}}" class="btn btn-success">@lang('lang.link_create')</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="display-5">@lang('lang.h2_myposts_list')</h2>
                </div>
                <div class="card-body">
                    <ul>
                    @forelse($blogPosts as $blogPost)
                        <li> <a href="{{route('blog.show', $blogPost->id)}}">{{ $blogPost->title }}</a></li>
                    @empty
                        <li class="text-danger">@lang('lang.no_blog')</li>
                    @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection