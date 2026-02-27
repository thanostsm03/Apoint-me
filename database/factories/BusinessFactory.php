<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->company();
        $category = fake()->randomElement(array_keys(config('business_categories')));
        $subcategory = fake()->randomElement(array_keys(config('business_categories.'.$category.'.subcategories')));

        return [
            'name' => $name,
            'slug' => \Illuminate\Support\Str::slug($name),
            'description' => fake()->paragraphs(3, true),
            'category' => $category,
            'subcategory' => $subcategory,
            'country' => fake()->country(),
            'city' => fake()->city(),
            'zip' => fake()->postcode(),
            'address' => fake()->address(),
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'website' => fake()->url(),
            'isActive' => true,
            'isVerified' => true,

            'owner_id' => \App\Models\Owner::inRandomOrder()->first()->id,
        ];
    }
}
