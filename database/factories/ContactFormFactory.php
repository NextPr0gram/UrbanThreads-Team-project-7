<?php

namespace Database\Factories;

use App\Models\ContactForm;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'FirstName' => $this->faker->firstName,
            'LastName' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'subject' => $this->faker->sentence,
            'message' => $this->faker->paragraph,
            // 'order_id' => optionally define a valid order_id if needed,
            // If you have Order factory, you can use it here.
        ];
    }
}
