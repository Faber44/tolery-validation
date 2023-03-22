@extends('layouts.app')

@inject('carbon', 'Carbon\Carbon')

@section('title')
    BDD - Affichage article
@endsection

@section('content')
    <div>
        @if(isset($article->id))
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img
                            src="{{ $article->pic_url }}"
                            class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-7 d-flex flex-column">
                        <div class="card-body">
                            <div class="my-4">
                                @if($article->categories)
                                    @foreach($article->categories as $category)
                                        <span class="badge bg-info text-dark">{{ $category }}</span>
                                    @endforeach
                                @endif
                            </div>

                            <h5 class="card-title mb-4">{{ $article->title }}</small></h5>

                            <a href="{{ $article->article_url }}" class="card-link" target="_blank">Consulter l'article
                                >></a>
                        </div>

                        <div class="card-footer text-center">
                            <small
                                class="text-muted">{{ $carbon::parse($article->published_at)->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>Aucun article à afficher.</p>
        @endif

        <div class="d-grid gap-2 col-4 mx-auto">
            <a href="{{ route('index') }}" class="btn btn-secondary" role="button"><<&nbsp;&nbsp;Retour à la
                liste</a>
        </div>
    </div>
@endsection
