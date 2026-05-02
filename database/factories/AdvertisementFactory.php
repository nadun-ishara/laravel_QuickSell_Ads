<?php

namespace Database\Factories;

use App\Models\Advertisement;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Advertisement>
 */
class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' =>1,
            'category_id' =>rand(1, 4),
            'location_id' =>rand(1, 4),
            'title' => $this->faker->sentence(2),
            'slug' =>Str::slug($this->faker->sentence(2)),
            'description' =>$this->faker->paragraph(3),
            'price' =>$this->faker->randomFloat(2, 100, 1000000),
            'status' =>'pending',
            'is_negotiable' =>rand(0, 1),
        ];
    }
}
