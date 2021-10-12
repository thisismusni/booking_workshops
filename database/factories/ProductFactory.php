<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::all()->random()->id,
            'name' => $this->faker->text(20),
            'price' => $this->faker->numberBetween(20000, 4000000),
            'description' => $this->faker->text(100),
            'image' => $this->faker->randomElement(
                [
                    "http://lorempixel.com/480/480",
                    "http://lorempixel.com/480/480/sports",
                    "http://placekitten.com/g/480/480",
                    "http://placekitten.com/480/480",
                    "https://picsum.photos/480/480",
                    "https://loremflickr.com/480/480"
                ]
            ),
            'status' => $this->faker->numberBetween(0, 1),
            'stock' => $this->faker->numberBetween(30, 100),
        ];
    }
}
