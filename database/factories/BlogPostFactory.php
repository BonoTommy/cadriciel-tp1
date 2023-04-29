<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\Etudiant;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $faker = Faker::create('fr_CA');
        $faker_ca = Faker::create('en_CA');

        return [
            'title'   => $faker_ca->sentence,
            'title_fr' => $faker->sentence,
            'body'    => $faker_ca->paragraph(30),
            'body_fr' => $faker->paragraph(30),
            'user_id' => Etudiant::all()->random()->id
        ];
    }
}
