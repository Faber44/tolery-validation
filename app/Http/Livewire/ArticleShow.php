<?php

namespace App\Http\Livewire;

use App\Http\Controllers\API\ArticleController;
use Illuminate\Http\Request;
use Livewire\Component;

class ArticleShow extends Component
{
    public $articleId;
    private $article;

    public function rules()
    {
        return [
            'articleId' => 'required',
        ];
    }

    public function mount(Request $request)
    {
        $articles = new ArticleController();
        $this->articles = json_decode($articles->index());

        $this->articleId = $request->articleId;
    }

    public function render()
    {
        $this->article = $this->articles[$this->articleId];

        return view('livewire.article-show')
            ->with('article', $this->article);
    }
}
