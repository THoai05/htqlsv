<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sinhvien;

/**
 * @extends Factory<Sinhvien>
 */
class SinhvienFactory extends Factory
{
    protected $model = Sinhvien::class;

    public function definition(): array
    {
        return [
            'hoten' => $this->faker->name(),
            'mssv' => $this->faker->unique()->numerify('SV###'),
            'email' => $this->faker->unique()->safeEmail(),
            'sdt' => substr($this->faker->unique()->phoneNumber(), 0, 15),
        ];
    }
}
