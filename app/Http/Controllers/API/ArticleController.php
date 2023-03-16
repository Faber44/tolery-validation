<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArticleController extends Controller
{
    public function index()
    {
        $url = 'http://dwh.lequipe.fr/api/edito/rss';
        $path = '/';
        // $path = '/Football/';
        // $path = '/Rugby/';
        $limit = 20;

        $response = Http::get($url,
            [
                'path' => $path,
            ]);

        if ($response->successful()) {

            $xmlObject = simplexml_load_string($response);
            $json = json_encode($xmlObject);

            $phpArray = json_decode($json, true);
            $articles = array_slice($phpArray['channel']['item'], 0, $limit);

            // Add articleId for paginate
            foreach ($articles as $key => $article) {
                $articles[$key]['articleId'] = $key;
            }

            return json_encode($articles, true);


        } elseif ($response->failed()) {
            return null;
        }
    }

    public function show($articleDatas)
    {

    }
}
