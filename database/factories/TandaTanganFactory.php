<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TandaTangan;

class TandaTanganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TandaTangan::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'jabatan' => $this->faker->word(),
            'nip' => $this->faker->word(),
            'pangkat' => $this->faker->word(),
        ];
    }
}
