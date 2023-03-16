@inject('carbon', 'Carbon\Carbon')

<div>
    <div class="row row-cols-1 row-cols-md-3 row-cols-xl-5 g-4">
        @foreach (collect($articles)->paginate(5) as $key => $article)
            <div class="col">
                <div class="card h-100 text-center">
                    <img
                        src="{{ isset($article->enclosure) ? $article->enclosure->{'@attributes'}->url : $article['enclosure']['@attributes']['url'] }}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ isset($article->title) ? $article->title : $article['title'] }}</h5>
                        <p class="card-text"></p>

                    </div>

                    <div class="mt-auto p-2">
                        <a href="{{ route('article.show', ['articleId'=>isset($article->articleId) ? $article->articleId : $article['articleId']]) }}"
                           class="btn btn-sm btn-primary">Plus d'infos</a>

                        {{--  <div class="btn btn-sm btn-primary" wire:click="showArticle({{ json_encode($article) }})">Plus--}}
                        {{--      d'infos--}}
                        {{--  </div>--}}
                    </div>

                    <div class="card-footer">
                        <small class="text-muted">
                            {{ $carbon::parse(isset($article->pubDate) ? $article->pubDate : $article['pubDate'])->diffForHumans() }}
                        </small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ collect($articles)->paginate(5)->links() }}
    </div>

</div>
