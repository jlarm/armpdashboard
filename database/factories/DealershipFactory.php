<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\DealershipType;
use App\Models\Dealership;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Dealership>
 */
final class DealershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dealershipName = fake()->company();
        $slug = (string) Str::slug($dealershipName);

        return [
            'uuid' => fake()->uuid(),
            'name' => $dealershipName,
            'slug' => $slug,
            'type' => fake()->randomElement(DealershipType::class),
        ];
    }
}
