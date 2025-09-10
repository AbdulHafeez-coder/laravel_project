<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name'    => $this->faker->name(),

            'email'   => $this->faker->unique()->safeEmail(),
            'phone_1' => $this->faker->unique()->numerify('03#########'),
            'phone_2' => $this->faker->unique()->numerify('03#########'),
            'address' => $this->faker->address(),
            'user_id' => 1,
        ];
    }
}
