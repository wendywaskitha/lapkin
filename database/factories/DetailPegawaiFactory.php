<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Jabatan;
use App\Models\Pangkat;
use App\Models\Eselon;
use Illuminate\Support\Str;
use App\Models\DetailPegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailPegawaiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailPegawai::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'nip' => $this->faker->word(),
            'pangkat_id' => Pangkat::factory(),
            'jabatan_id' => Jabatan::factory(),
            'eselon_id' => Eselon::factory(),
        ];
    }
}
