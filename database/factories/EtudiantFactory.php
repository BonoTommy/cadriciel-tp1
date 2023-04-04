<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;
use Faker\Factory as Faker;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('fr_CA');
        $phoneUtil = PhoneNumberUtil::getInstance();
        $phoneNumber = $faker->phoneNumber();

        $phoneNumberObject = $phoneUtil->parse($phoneNumber, 'CA');
        $standardizedPhoneNumber = $phoneUtil->format($phoneNumberObject, PhoneNumberFormat::NATIONAL);

        return [
            'nom'               => $faker->name(),
            'email'             => $faker->unique()->safeEmail(),
            'phone'             => $standardizedPhoneNumber,
            'adresse'           => $faker->streetAddress('CA-QC'),
            'date_de_naissance' => $faker->dateTimeBetween('-65 years', '-18 years')->format('d-m-Y'),
            'ville_id'          => $faker->numberBetween(1, 15)
        ];
    }
}
