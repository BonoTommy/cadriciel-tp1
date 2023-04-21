@extends('layouts.app')
@section('title', 'Blog - Welcome')
@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <a href="{{route('blog.index')}}" class="btn btn-primary btn-sm" >Return</a>
            <h2 class="display-8 pt-3">
                {{ $blogPost->title}}
            </h2>
            <hr>
                {!! $blogPost->body !!}
                <p>
                    Author : {{ $blogPost->blogHasUser->name }}
                </p>
            <hr>
        </div>
    </div>
    @if (Auth::user()->id == $blogPost->user_id)
    <div class="row text-center">
        <div class="col-md-6">
            <a href="{{ route('blog.edit', $blogPost->id)}}" class="btn btn-success btn-sm">Modifier</a>
        </div>
        <div class="col-md-6">
                <input type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete" value="Effacer">
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you to delete the blog : {{ $blogPost->title }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger"> Effacer </button>
            </form>
      </div>
    </div>
  </div>
</div>
    @endif
@endsection