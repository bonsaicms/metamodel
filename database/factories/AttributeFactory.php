<?php

namespace BonsaiCms\Metamodel\Database\Factories;

use Illuminate\Support\Str;
use BonsaiCms\Metamodel\Models\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attribute::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->words(rand(1, 3), true);

        return [
            'name' => Str::title($name),
            'column' => Str::snake($name),
            'type' => $this->faker->randomElement([
                // TODO
                'string',
                'integer',
                'boolean',
            ]),
        ];
    }
}
