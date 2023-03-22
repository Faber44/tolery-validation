<?php

namespace Database\Seeders;

use App\Http\Controllers\API\ArticleController;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        // Article::factory()->count(10)->create();

        $rss = new ArticleController();
        $items = json_decode($rss->index());

        foreach ($items as $item) {
            /** Find existing Article */
            $uriSegments = explode("/", parse_url($item->guid, PHP_URL_PATH));
            $guid = array_pop($uriSegments);

            /** Insert new Article if not present */
            if (Article::where('guid', $guid)->get()->isEmpty()) {
                Article::create([
                    'guid'         => $guid,
                    'title'        => $item->title,
                    'article_url'  => $item->guid,
                    'pic_url'      => $item->enclosure->{'@attributes'}->url,
                    'pic_type'     => $item->enclosure->{'@attributes'}->type,
                    'categories'   => json_encode($item->category),
                    'published_at' => Carbon::parse($item->pubDate)->toDateTime(),
                ]);
            }
        }
    }
}
