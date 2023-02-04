<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccountType>
 */
class AccountTypeFactory extends Factory
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
            'name' => $this->faker->unique()->sentence($this->faker->numberBetween(1, 8), false),
            'created_at'=>$dateCreated,
//            'updated_at'=>$dateUpdated,
        ];
    }
}
