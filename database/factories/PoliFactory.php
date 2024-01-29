<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poli>
 */
class PoliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $polies = ['umum', 'gigi', 'KIA'];
        $dokters = ['aslam', 'surya', 'harisman'];
        return [
            'nama_poli' => $this->faker->unique()->randomElement($polies),
            'dokter' => $this->faker->unique()->randomElement($dokters),
        ];
    }
}
