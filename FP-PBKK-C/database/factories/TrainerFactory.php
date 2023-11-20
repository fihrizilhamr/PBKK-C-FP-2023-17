<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trainer;
use Illuminate\Support\Facades\Storage;

class TrainerFactory extends Factory
{
    protected $model = Trainer::class;

    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $nama = $this->faker->name($gender);

        // Download an image and store its path
        $imagePath = $this->downloadAndSaveImage();

        return [
            'Email' => strtolower(str_replace(' ', '', $nama)) . '@mail.com',
            'Nama' => $nama,
            'TL' => $this->faker->dateTimeBetween('1970-01-01', '2010-12-31')->format('Y-m-d'),
            'Alamat' => $this->faker->address,
            'NHP' => $this->faker->phoneNumber,
            'Gender' => ($gender == 'male') ? 'Laki-laki' : 'Perempuan',
            'Password' => bcrypt($this->faker->password),
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
        return 'trainer_images/' . $filename;
    }
}
