<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $faker = $this->faker;
        $prefecture = $faker->prefecture();
        $city = $faker->city();
        $streetAddress = $faker->streetAddress();
        $lastName = $faker->lastName();
        $firstName = $faker->firstName();
        return [
            'fullname' => $lastName . $firstName,
            'gender' => $faker->numberBetween(1, 2),
            'email' => $faker->safeEmail(),
            'postcode' => $faker->numerify('###-####'),
            'address' => $prefecture . $city . $streetAddress,
            'building_name' => $faker->secondaryAddress(),
            'opinion' => $faker->realText(120),
            'created_at' => $faker-> dateTimeBetween('-1 week', '+1 week'),
            'updated_at' => $faker-> dateTimeBetween('-1 week', '+1 week')
        ];
    }
}
