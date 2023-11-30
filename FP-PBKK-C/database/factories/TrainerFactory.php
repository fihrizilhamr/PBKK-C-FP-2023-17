<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trainer;
use Illuminate\Support\Facades\Storage;

class TrainerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Trainer::class;

    public function definition()
    {
        // Download an image and store its path
        $imagePath = $this->downloadAndSaveImage();

        return [
            'Lokasi' => $this->faker->address,
            'Foto' => $imagePath,
        ];
    }

    private function downloadAndSaveImage()
    {
        // Use Faker's image URL method to get a random image URL
        $imageUrl = $this->faker->imageUrl();
    
        // Get the image content
        $imageContent = file_get_contents($imageUrl);
    
        // Generate a unique filename for the image
        $filename = 'trainer_' . uniqid() . '.jpg';
    
        // Save the image to the storage disk
        $result = Storage::put('public/trainer_images/' . $filename, $imageContent);
    
        // Return the path to the saved image
        return $filename;
    }
}
