<?php

namespace App\Http\Livewire;

use App\Http\Controllers\API\ArticleController;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public $articles = [];
    // public $showArticle = 0;
    public $article = [];

    public function mount()
    {
        $articles = new ArticleController();
        $this->articles = json_decode($articles->index());

        $this->article = null;
    }

    public function showArticle($article)
    {
        $this->article = $article;

        dd($this->article);

        return $this->article;
        return view('livewire.article-show', ['article' => $article]);
    }

    public function render()
    {
        $articles = $this->articles;

        return view('livewire.article-index', compact('articles'));

        // return view('livewire.article-index', [
        //     'publications' => collect($this->articles)->paginate(10),
        // ]);
    }

    public function openDiv()
    {
        $this->showDiv =! $this->showDiv;
    }
}
