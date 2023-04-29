@extends('layouts.app')
@section('title', 'Blog - Show')
@section('h1', __('lang.title_blog'))
@section('content')
      
  
    <div class="row mt-5">
        <div class="col-12">
            <a href="{{route('blog.index')}}" class="btn btn-primary btn-sm" >@lang('lang.btn_back')</a>
            <h2 class="display-8 pt-3">
                {{ $blog->title}}
            </h2>
            <hr>
                {!! $blog->body !!}
                <p>
                    @lang('lang.author') : {{ $blog->blogHasEtudiant->nom }}
                </p>
            <hr>
        </div>
    </div>
    @if (Auth::user()->id == $blog->user_id)
    <div class="row text-center">
        <div class="col-md-6">
            <a href="{{ route('blog.edit', $blog->id)}}" class="btn btn-success btn-sm">@lang('lang.btn_edit')</a>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.btn_delete')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @lang('lang.delete_question') : {{ $blog->title }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.btn_close')</button>
            <form method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger"> @lang('lang.btn_delete') </button>
            </form>
      </div>
    </div>
  </div>
</div>
    @endif
@endsection