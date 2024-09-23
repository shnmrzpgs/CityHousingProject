<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TransactionType;

class TransactionTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransactionType::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'type_name' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'description' => $this->faker->text(),
        ];
    }
}
