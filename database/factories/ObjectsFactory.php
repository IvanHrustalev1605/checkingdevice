<?php

namespace Database\Factories;

use App\Models\Objects;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ObjID>
 */
class ObjectsFactory extends Factory
{
    protected $model = Objects::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ObjName' => Str::random(10),
            'comments' => $this->faker->text(50)
        ];
    }
}
