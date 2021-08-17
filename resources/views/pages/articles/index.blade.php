@extends('layouts.default')

@section('body')
    <div class="container">
        <h1 class="text-center mt -4">Articles</h1>
        <div class="d-flex justify-content-center">
            <a class="btn btn-info my-3" href="{{ route('articles.create')}}"><i class="fas fa-plus mx-2"></i> Ajouter un nouvel article</a>
        </div>
        <table class="table table-hover">
            <thead>
            <tr class="table-active">
                <th scope="col">ID</th>
                <th scope="col">Titre</th>
                <th scope="col">Crée le</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <th>{{ $article->id }}</th>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->dateFormatted() }}</td>
                        <td class="d-flex">
                            <a class="btn btn-warning mx-3" href="">Editer</a>
                            {{-- <a class="btn btn-danger mx-3" href="{{route('articles.delete', [$article->id])}}">Supprimer</a> --}}
                            <form action="{{ route('articles.delete', [$article->id]) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger mx-3" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center mt-5">
            {{ $articles->links('vendor.pagination.custom') }}
        </div>  
    </div>
@endsection