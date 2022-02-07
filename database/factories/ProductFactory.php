<?php


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(255),
            'description' => $this->faker->text(3000),
            'image' => $this->faker->text(),
            'brand' => $this->faker->text(20),
            'price' => $this->faker->numberBetween(1, 2000),
            'price_sale' => $this->faker->numberBetween(1, 1500),
            'category' => $this->faker->text(15),
            'stock' => $this->faker->numberBetween(1, 250),
        ];
    }
}
