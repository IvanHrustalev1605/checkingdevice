<?php

namespace Database\Factories;

use App\Models\Pribori;
use App\Models\Verifier;
use App\Models\Where;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Where>
 */
class WhereFactory extends Factory
{
    protected $model = Where::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'PriborID' => Pribori::get()->random()->PriborID,
            'Vid' => Verifier::get()->random()->Vid,
            'delivered' => $this->faker->date(),
            'takenAway' => $this->faker->date(),
        ];
    }
}
