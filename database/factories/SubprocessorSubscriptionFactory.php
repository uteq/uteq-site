<?php

namespace Database\Factories;

use App\Models\SubprocessorSubscription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SubprocessorSubscription>
 */
class SubprocessorSubscriptionFactory extends Factory
{
    protected $model = SubprocessorSubscription::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->name(),
            'confirmed_at' => now(),
            'unsubscribed_at' => null,
            'ip_address' => $this->faker->ipv4(),
        ];
    }

    public function unconfirmed(): static
    {
        return $this->state(fn () => ['confirmed_at' => null]);
    }

    public function unsubscribed(): static
    {
        return $this->state(fn () => ['unsubscribed_at' => now()]);
    }
}
