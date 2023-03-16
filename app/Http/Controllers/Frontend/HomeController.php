<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home');
    }

    public function show(Request $request) {
        return view('show', ['articleId' => $request->articleId]);
    }
}
