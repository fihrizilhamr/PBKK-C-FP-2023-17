<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Article::class;
    public function definition(): array
    {
        $imagePath = $this->downloadAndSaveImage();
        $words = $this->faker->words;
        return [
            'Foto' => $imagePath,
            'Judul' => implode(' ', $words),
            'Text' => $this->faker->paragraphs(1, true),
        ];
    }

    private function downloadAndSaveImage()
    {
        // Use Faker's image URL method to get a random image URL
        $imageUrl = $this->faker->imageUrl();
    
        // Get the image content
        $imageContent = file_get_contents($imageUrl);
    
        // Generate a unique filename for the image
        $filename = 'article_' . uniqid() . '.jpg';
    
        // Save the image to the storage disk
        $result = Storage::put('public/article_images/' . $filename, $imageContent);
    
        // Return the path to the saved image
        return $filename;
    }
}
