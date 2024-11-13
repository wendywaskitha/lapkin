<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Stpjm;
use App\Models\TandaTangan;
use App\Models\UnitKerja;
use App\Models\User;

class StpjmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stpjm::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'tanggal' => $this->faker->date(),
            'user_id' => User::factory(),
            'unitkerja_id' => $this->faker->word(),
            'tandatangan_id' => $this->faker->word(),
            'unit_kerja_id' => UnitKerja::factory(),
            'tanda_tangan_id' => TandaTangan::factory(),
        ];
    }
}
