<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'jk' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'ttl' => $this->faker->date,
            'no_hp' => $this->faker->phoneNumber,
            'alamat' => $this->faker->address,
        ];
    }
}
