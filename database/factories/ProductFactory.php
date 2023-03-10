<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price = rand(10000,100000);
        return [
            'type_id' => rand(1,2),
            'name' => fake()->name(),
            'image' => '[{"name":"202302271057Ni51kuLraWnsmm0ij0NitP232cSERyxcRrw1TkHz.jpg"},{"name":"202302271057U9G8a5Ac1WRwyOKIgiFO7DkZN4P8Y8CvWwPMU4DO.jpg"}]',
            'description' => fake()->paragraph(),
            'price' => $price,
            'sale' => $price,
            'available' => rand(10,100),
            'chars' => '{"asd":"23","asd1":"45","asd3":"32"}',
        ];
    }
}
