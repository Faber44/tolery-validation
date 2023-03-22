<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition()
    {
        $articleUrls = collect([
            'https://www.lequipe.fr/Rugby/Actualites/Transferts-clovis-le-bail-pau-vers-le-racing/1387244',
            'https://www.lequipe.fr/Volley-ball/Actualites/Benjamin-toniutti-a-jastrzebski-jusqu-en-2024/1387241',
            'https://www.lequipe.fr/Football/Actualites/Melvin-bard-adrien-truffert-et-joris-chotard-declarent-forfait-avec-les-espoirs/1387240',
            'https://www.lequipe.fr/Cyclisme-sur-route/Actualites/Giulio-ciccone-remporte-la-2e-etape-du-tour-de-catalogne-devant-roglic-et-evenepoel/1387237'
        ]);

        $categories = collect([
            'Foot', 'Rugby', 'Golf', 'Tennis', 'F1'
        ]);
        $rand = random_int(0, $categories->count());

        return [
            'title' => fake()->sentence(6),
            'article_url' => $articleUrls->random(),
            'pic_url' => fake()->imageUrl(665, 335, null, true, null, false, 'jpg'),
            'pic_type' => 'image/jpeg',
            'categories' => json_encode($categories->random($rand)),
            'published_at' => fake()->dateTimeThisMonth,
        ];
    }
}
