<?php

namespace Database\Factories;

use App\Models\Verifier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Verifier>
 */
class VerifierFactory extends Factory
{
    protected $model = Verifier::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(7),
            'adress' => $this->faker->address(15),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
        ];
    }
}
