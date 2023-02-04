<?php

namespace Database\Factories;

use App\Models\AccountType;
use App\Models\Currency;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $createdDayLast = $this->faker->numberBetween(1, 20);
        $dateCreated = $this->faker->dateTimeBetween(sprintf('%s days', '-'.$createdDayLast));
//        $dateUpdated = $this->faker->dateTimeBetween(sprintf('%s day', '-' . ($createdDayLast / 2)));

        return [
            'name' => $this->faker->sentence(6),
            'balance' => ($this->faker->boolean() ? 1 : -1) * $this->faker->randomFloat($this->faker->numberBetween(0, 8)),
            'user_id' => function (array $attributes) {
                return User::inRandomOrder()->first();
            },
            'account_type_id' => function (array $attributes) {
                return AccountType::inRandomOrder()->first();
            },
            'currency_id' => function (array $attributes) {
                return Currency::inRandomOrder()->first();
            },
            'created_at'=>$dateCreated,
//            'updated_at'=>$dateUpdated,
        ];
    }
}
