<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\LaporanKinerja;
use App\Models\User;

class LaporanKinerjaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LaporanKinerja::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'tanggal' => $this->faker->dateTime(),
            'jam_kerja' => $this->faker->time(),
            'uraian' => $this->faker->text(),
            'target' => $this->faker->randomFloat(0, 0, 9999999999.),
            'realisasi' => $this->faker->randomFloat(0, 0, 9999999999.),
            'capaian' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}
