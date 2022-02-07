<?php

namespace BonsaiCms\Metamodel\Database\Factories;

use BonsaiCms\Metamodel\Models\Relationship;
use Illuminate\Database\Eloquent\Factories\Factory;

class RelationshipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Relationship::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $cardinality = $this->faker->randomElement([
            'oneToOne',
            'oneToMany',
            'manyToMany',
        ]);

        return [
            'cardinality' => $cardinality,
            'pivot_table' => ($cardinality === 'manyToMany') ? $this->faker->word : null,
            'left_foreign_key' =>  $this->faker->word,
            'right_foreign_key' =>  $this->faker->word,
            'left_relationship_name' =>  $this->faker->word,
            'right_relationship_name' =>  $this->faker->word,
        ];
    }
}
