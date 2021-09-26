<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'amount' => rand(10, 150),
            'notes' => $this->faker->name(),
            'type_id' => rand(1, 5),
            'created_at' => now(),
            'updated_at' => now(),
            'user_id' => rand(1, 2)
        ];
    }
}
