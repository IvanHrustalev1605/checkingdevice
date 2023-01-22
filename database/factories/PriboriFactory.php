<?php

namespace Database\Factories;

use App\Models\Objects;
use App\Models\Pribori;
use App\Models\Verifier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Pribori>
 */
class PriboriFactory extends Factory
{
    protected $model = Pribori::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(7),
            'number' => Str::random(8),
            'ObjID' => Objects::get()->random()->ObjID,
            'currentDate' => $this->faker->date,
            'nextDate' => $this->faker->date,
            'comments' => $this->faker->text(37),
            'Vid' => Verifier::get()->random()->Vid
        ];
    }
}
