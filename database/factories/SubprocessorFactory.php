<?php

namespace Database\Factories;

use App\Models\Subprocessor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subprocessor>
 */
class SubprocessorFactory extends Factory
{
    protected $model = Subprocessor::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'service' => $this->faker->randomElement(['LLM-API', 'Hosting', 'CDN', 'E-mail', 'Vector database', 'Betalingen']),
            'data_location' => $this->faker->randomElement(['EU', 'VS', 'EU/VS', 'Wereldwijd edge']),
            'transfer_basis' => $this->faker->randomElement(['Niet van toepassing (EER)', "EU-VS DPF + SCC's", "SCC's", 'Adequaatheidsbesluit']),
            'model_training' => $this->faker->randomElement(['Niet van toepassing', 'Nee, opt-out via API']),
            'country_code' => $this->faker->randomElement(['NL', 'DE', 'EE', 'IE', 'US']),
            'notes' => null,
            'sort_order' => $this->faker->numberBetween(0, 100),
            'active' => true,
            'effective_from' => '2026-04-01',
            'effective_until' => null,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['active' => false]);
    }
}
