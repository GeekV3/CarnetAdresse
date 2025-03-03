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

    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'entreprise' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'telephone_1' => $this->faker->phoneNumber(),
            'telephone_2' => $this->faker->phoneNumber(),
            'description' => $this->faker->sentence(10),
        ];
    }
}
