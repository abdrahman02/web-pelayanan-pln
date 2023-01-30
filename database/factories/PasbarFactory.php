<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasbar>
 */
class PasbarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->randomDigitNotNull(),
            'alamat' => fake()->sentence(),
            'kelurahan' => fake()->word(),
            'no_rumah' => fake()->numberBetween(1,300),
            'rt' => fake()->randomDigitNotNull(),
            'rw' => fake()->randomDigitNotNull(),
            'telepon' => fake()->numerify('############'),
            'identitas' => fake()->randomElement(['KTP', 'SIM', 'Passport']),
            'no_identitas' => fake()->numerify('################'),
            'layanan' => fake()->randomElement(['Prabayar', 'Pascabayar']),
            'peruntukan' => fake()->randomElement(['Rumah Tangga', 'Bisnis']),
            'daya' => fake()->randomElement(['450', '900', '1.300', '2.200', '3.500', '5.500', '6.600']),
            // 'jadwal_pasang' => fake()->dateTimeBetween('now', '+1 week')
        ];
    }
}
