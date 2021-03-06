<?php

namespace BonsaiCms\Metamodel\Database\Factories;

use Illuminate\Support\Str;
use BonsaiCms\Metamodel\Models\Entity;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(rand(1, 3), true);

        return [
            'name' => Str::studly($name),
            'table' => Str::snake(Str::plural($name)),
        ];
    }
}
