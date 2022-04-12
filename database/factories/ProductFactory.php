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
        return [
            'name'=>$this->faker->name(),
            'description'=>$this->faker->text(50),
            'price'=>$this->faker->randomFloat(2,4,2),
            'image_url'=>$this->faker->imageUrl(400,600),
            'status'=>$this->faker->numberBetween(0,1),
            'category_id'=>$this->faker->numberBetween(30,50)
            //
        ];
        
    }
}
