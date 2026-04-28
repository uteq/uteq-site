<?php

namespace App\Console\Commands\Subprocessors;

use App\Models\Subprocessor;
use App\Models\SubprocessorChange;
use Illuminate\Console\Command;

class RemoveCommand extends Command
{
    protected $signature = 'subprocessor:remove
        {id : ID van de subverwerker}
        {--effective-from= : Ingangsdatum (YYYY-MM-DD), default: 14 dagen vanaf nu}
        {--summary= : Samenvatting voor changelog/broadcast}';

    protected $description = 'Markeer een subverwerker als beëindigd en log een wijziging';

    public function handle(): int
    {
        $sub = Subprocessor::find($this->argument('id'));
        if (! $sub) {
            $this->error('Subverwerker niet gevonden.');
            return self::FAILURE;
        }

        $effectiveFrom = $this->option('effective-from') ?: now()->addDays(14)->toDateString();

        $sub->forceFill([
            'active' => false,
            'effective_until' => $effectiveFrom,
        ])->save();

        $summary = $this->option('summary') ?: "{$sub->name} verwijderd uit de subverwerkerlijst per {$effectiveFrom}.";

        SubprocessorChange::create([
            'subprocessor_id' => $sub->id,
            'change_type' => SubprocessorChange::TYPE_REMOVED,
            'summary' => $summary,
            'effective_from' => $effectiveFrom,
            'published_at' => now(),
        ]);

        $this->info("Verwijderd: {$sub->name} per {$effectiveFrom}.");
        return self::SUCCESS;
    }
}
