@extends('layouts.app')
@section('title', 'Blog - My posts')
@section('content')
    <div class="row">
        <div class="col-12 text-center pt-3">
            <h1 class="display-3 mt-3">
                {{ config('app.name')}}
            </h1>
        </div>
        <hr>
        <div class="col-md-8">
            <p>
                Bonne lecture!
            </p>
        </div>
        <div class="col-md-4">
            <a href="{{ route('blog.create' )}}" class="btn btn-success">Ajouter</a>
            <a href="{{ route('blog.myPosts' )}}" class="btn btn-warning">Mes articles</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="display-5">My posts List</h2>
                </div>
                <div class="card-body">
                    <ul>
                    @forelse($blogPosts as $blogPost)
                        <li> <a href="{{route('blog.show', $blogPost->id)}}">{{ $blogPost->title }}</a></li>
                    @empty
                        <li class="text-danger">There is no blog</li>
                    @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection