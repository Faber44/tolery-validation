@inject('carbon', 'Carbon\Carbon')

<div>
    @if(isset($articleId))
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-5">
                    <img
                        src="{{ isset($article->enclosure) ? $article->enclosure->{'@attributes'}->url : $article['enclosure']['@attributes']['url'] }}"
                        class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-7 d-flex flex-column">
                    <div class="card-body">
                        <div class="my-4">
                            @if(!empty($article->category))
                                @if(is_array($article->category))
                                    @foreach($article->category as $category)
                                        <span class="badge bg-info text-dark">{{ $category }}</span>
                                    @endforeach
                                @else
                                    <span class="badge bg-info text-dark">{{ $article->category }}</span>
                                @endif
                            @endif
                        </div>

                        <h5 class="card-title mb-4">{{ $article->title }}</small></h5>

                        {{-- <p class="card-text">Lorem ipsum ...</p>--}}

                        <a href="{{ $article->guid }}" class="card-link" target="_blank">Consulter l'article >></a>
                    </div>

                    <div class="card-footer text-center">
                        <small
                            class="text-muted">{{ $carbon::parse(isset($article->pubDate) ? $article->pubDate : $article['pubDate'])->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p>Aucun article à afficher.</p>
    @endif

    <div class="d-grid gap-2 col-4 mx-auto">
        <a href="{{ url()->previous() }}" class="btn btn-secondary" role="button"><<&nbsp;&nbsp;Retour à la liste</a>
    </div>
</div>
