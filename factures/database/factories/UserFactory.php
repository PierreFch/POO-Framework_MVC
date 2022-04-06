<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->name(),
            'email' => $this->unique()->safeEmail(),
            'email_verified_at' => now(),
            'github_id' => $this->github_id(),
            'contact_email' => $this->contact_email(),
            'phone' => $this->phone(),
            'company_address' => $this->company_address(),
            'company_siret' => $this->company_siret(),
            'company_ape' => $this->company_ape(),
            'bank_incumbent' => $this->bank_incumbent(),
            'bank_domiciliation' => $this->bank_domiciliation(),
            'bank_rib' => $this->bank_rib(),
            'bank_iban' => $this->bank_iban(),
            'bank_bic' => $this->bank_bic(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
