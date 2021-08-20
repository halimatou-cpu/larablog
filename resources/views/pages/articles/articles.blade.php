@extends('layouts.default')

@section('title')
    Article's list
@endsection

@section('body')
    <div class="jumbotron">
        <h1 class="display-3 text-center">Articles</h1>
        {{-- include livewire component --}}
        @livewire('filters', ['categories' => $categories]) 
        {{-- <div class="d-flex justify-content-center mt-5">
            {{ $articles->links('vendor.pagination.custom') }}
        </div> --}} 
        {{-- Comment pagination custom Because of possible confict with livewire --}}
    </div>
@endsection