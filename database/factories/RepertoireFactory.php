<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use App\Models\Etudiant;
use Illuminate\Support\Facades\Storage;

class RepertoireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('fr_CA');
        $fileTypes = ['pdf', 'doc', 'zip'];
        $fileType = Arr::random($fileTypes);

        $file = UploadedFile::fake()->create('document.'.$fileType, 1000, $fileType);
        
        Storage::put('repertoires', file_get_contents($file));
        return [
            'title' => $this->faker->sentence,
            'title_fr' => $faker->sentence,
            'file' => 'documents/repertoires/document.' . $fileType,
            'etudiant_id' => Etudiant::all()->random()->id
        ];
    }
}
