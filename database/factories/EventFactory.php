<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'date' => $this->faker->dateTimeBetween('+1 months',' +12 months'),
            'venue' => $this->faker->word . ' Teather',
            'description' => $this->faker->paragraph(2),
            'ticket_price' => $this->faker->numberBetween(10000,100000),
        ];
    }
}
