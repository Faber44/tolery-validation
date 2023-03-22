@extends('layouts.app')

@inject('carbon', 'Carbon\Carbon')

@section('title')
    BDD - Affichage Liste des articles
@endsection

@section('content')

    <div>
        <div class="row row-cols-1 row-cols-md-3 row-cols-xl-5 g-4">
            @foreach ($articles as $key => $article)
                <div class="col">
                    <div class="card h-100 text-center">
                        <img
                            src="{{ $article->pic_url }}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text"></p>

                        </div>

                        <div class="mt-auto p-2">
                            <a href="{{ route('article.show', $article->id) }}"
                               class="btn btn-sm btn-primary">Plus d'infos</a>
                        </div>

                        <div class="card-footer">
                            <small class="text-muted">
                                {{ $carbon::parse($article->published_at)->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-3">
            @if($articles->count() > 0)
                {{ $articles->links() }}
            @else
                Aucun article disponible pour le moment.
            @endif
        </div>

    </div>

@endsection
