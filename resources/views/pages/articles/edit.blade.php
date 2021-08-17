@extends('layouts.default')

@section('title')
    Create Article
@endsection

@section('body')
    {{-- @dump($errors->all()) --}}
    <div class="container">
        <h1 class="text-center mt-5">Editer cet article</h1>
        <form method="POST" action="{{ route('articles.update', [$article->id]) }}">
            @csrf
            @method("PUT")
            <div class="col-12">
                <div class="form-group">
                    <label for="">Titre</label>                    
                    <input type="text" name="title" value="{{ $article->title }}" class="form-control @error('title') is-invalid @enderror " placeholder="Titre de l'article">
                    @error('title')
                        <span class="invalid-feedback d-flex" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="">Sous-titre</label>
                    <input type="text" name="subtitle" value="{{ $article->subtitle }}" class="form-control @error('subtitle') is-invalid @enderror" placeholder="Sous-titre de l'article">
                    <small class="form-text text-muted">Décrivez le contenu de l'article</small>
                    @error('subtitle')
                        <span class="invalid-feedback d-flex" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Contenu</label>
                    <textarea id="tynicme-editor" name="content" class="form-control w-100 @error('content') is-invalid @enderror">
                        {{ $article->content }}
                    </textarea>
                    @error('content')
                        <span class="invalid-feedback d-flex" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <script>
                    tinymce.init({
                      selector: '#tynicme-editor'
                    });
                </script>
            </div>
            <div class="d-flex justify-content-center mb-5">
                <button type="submit" class="btn btn-primary mt-4">Modifier l'article</button>
            </div>
        </form>
    </div>
@endsection

