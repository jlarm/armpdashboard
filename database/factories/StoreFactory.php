<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\State;
use App\Models\Dealership;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Store>
 */
final class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $storeName = fake()->company();
        $slug = (string) Str::slug($storeName);

        return [
            'uuid' => fake()->uuid(),
            'dealership_id' => Dealership::factory(),
            'name' => $storeName,
            'slug' => $slug,
            'address' => fake()->streetAddress(),
            'city' => fake()->city(),
            'state' => fake()->randomElement(State::class),
            'zip' => fake()->postcode(),
            'phone' => fake()->phoneNumber(),
            'timezone' => fake()->timezone(),
        ];
    }
}
