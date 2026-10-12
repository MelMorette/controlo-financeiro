<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Enums\Currency;
use App\Models\Category;
use App\Models\Person;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'person_id' => Person::factory(),
            'category_id' => Category::factory(),
            'description' => fake()->words(2, true),
            'amount' => fake()->randomFloat(2, 1, 300),
            'currency' => Currency::EUR,
            'occurred_on' => fake()->dateTimeThisYear(),
        ];
    }
}
