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
    public $article = [];

    public function mount()
    {
        $articles = new ArticleController();
        $this->articles = json_decode($articles->index());

        $this->article = null;
    }

    public function render()
    {
        $articles = $this->articles;

        return view('livewire.article-index', compact('articles'));
    }
}
