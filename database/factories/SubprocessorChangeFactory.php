<?php

namespace Database\Factories;

use App\Models\Subprocessor;
use App\Models\SubprocessorChange;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SubprocessorChange>
 */
class SubprocessorChangeFactory extends Factory
{
    protected $model = SubprocessorChange::class;

    public function definition(): array
    {
        return [
            'subprocessor_id' => Subprocessor::factory(),
            'change_type' => $this->faker->randomElement([
                SubprocessorChange::TYPE_INITIAL,
                SubprocessorChange::TYPE_ADDED,
                SubprocessorChange::TYPE_UPDATED,
                SubprocessorChange::TYPE_REMOVED,
            ]),
            'summary' => $this->faker->sentence(6),
            'details' => null,
            'effective_from' => now()->toDateString(),
            'published_at' => now(),
            'broadcast_at' => null,
        ];
    }

    public function unpublished(): static
    {
        return $this->state(fn () => ['published_at' => null]);
    }
}
