<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $limit = 20;
    private $paginate = 5;

    public function index()
    {
        /** Articles > Last Published Records */
        $articles = Article::all()
                           ->sortByDesc('published_at')
                           ->take($this->limit)
                           ->paginate($this->paginate);

        // Without Pagination
        // $articles = Article::latest('published_at')
        //                    ->take($this->limit)
        //                    ->get();


        /** Articles > Random */
        // $articles = Article::inRandomOrder()
        //                    ->limit(20)
        //                    ->get();
        // dd($articles);

        return view('frontend.index', compact('articles'));
    }

    public function show(Request $request)
    {
        $article = Article::findOrFail($request->id);

        $categories = json_decode($article->categories);
        if(!empty($categories)) {
            $article->categories = $categories;
        } else {
            $article->categories = null;
        }

        return view('frontend.show', compact('article'));
    }
}
