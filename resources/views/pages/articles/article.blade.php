@extends('layouts.default')

@section('title')
    {{ $article->slug }}
@endsection

@section('body')
    <div class="jumbotron">
        <h1 class="display-4 text-center"> {{$article->title}} </h1>
        <div class="d-flex justify-content-center my-5">
            <a class="btn btn-primary" href="{{ route('articles') }}">
                <i class="fas fa-arrow-left"></i>
                Retour 
            </a>
        </div>
        <h5 class="text-center my-3 pt-3">{{ $article->subtitle }}</h5>
        <div class="d-flex justify-content-center">
            <span class="badge rounded-pill bg-dark">{{ $article->category->label }}</span>
        </div>
    </div>
    <div class="container">
        <p class="text-center row justify-content-center">
            {{-- <img src="{{ $article->image }}" class="w-25 my-5"> --}}
            <img src="{{ Voyager::image( $article->image ) }}" class="w-25 my-5">
            {!! $article->content !!}
        </p>
    </div>
@endsection