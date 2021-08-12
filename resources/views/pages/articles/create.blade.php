@extends('layouts.default')

@section('title')
    Create Article
@endsection

@section('body')
    <div class="container">
        <h1 class="text-center mt-5">Poster un nouvel article</h1>
        <form method="POST" action="{{ route('articles.store') }}">
            @csrf
            <div class="col-12">
                <div class="form-group">
                    <label for="">Titre</label>
                    <input type="text" name="title" class="form-control" placeholder="Titre de l'article">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">Sous-titre</label>
                    <input type="text" name="subtitle" class="form-control" placeholder="Sous-titre de l'article">
                    <small class="form-text text-muted">Décrivez le contenu de l'article</small>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Contenu</label>
                    <textarea id="tynicme-editor" name="content" class="form-control w-100"></textarea>
                </div>
                <script>
                    tinymce.init({
                      selector: '#tynicme-editor'
                    });
                </script>
            </div>
            <div class="d-flex justify-content-center mb-5">
                <button type="submit" class="btn btn-primary">Poster l'article</button>
            </div>
        </form>
    </div>
@endsection

