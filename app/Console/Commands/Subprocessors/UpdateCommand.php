<?php

namespace App\Console\Commands\Subprocessors;

use App\Models\Subprocessor;
use App\Models\SubprocessorChange;
use Illuminate\Console\Command;

class UpdateCommand extends Command
{
    protected $signature = 'subprocessor:update
        {id : ID van de subverwerker}
        {--name= : Naam}
        {--service= : Dienst}
        {--data-location= : Datalocatie}
        {--transfer-basis= : Doorgiftegrondslag}
        {--model-training= : Beleid rond modeltraining}
        {--effective-from= : Ingangsdatum (YYYY-MM-DD), default: 14 dagen vanaf nu}
        {--summary= : Samenvatting voor changelog/broadcast}';

    protected $description = 'Wijzig een bestaande subverwerker en log de wijziging';

    public function handle(): int
    {
        $sub = Subprocessor::find($this->argument('id'));
        if (! $sub) {
            $this->error('Subverwerker niet gevonden.');
            return self::FAILURE;
        }

        $effectiveFrom = $this->option('effective-from') ?: now()->addDays(14)->toDateString();

        $changes = array_filter([
            'name' => $this->option('name'),
            'service' => $this->option('service'),
            'data_location' => $this->option('data-location'),
            'transfer_basis' => $this->option('transfer-basis'),
            'model_training' => $this->option('model-training'),
        ], fn ($v) => $v !== null && $v !== '');

        if (empty($changes)) {
            $this->error('Geef minstens één veld op om te wijzigen.');
            return self::FAILURE;
        }

        $sub->fill($changes);
        $sub->save();

        $summary = $this->option('summary') ?: "Wijziging in vermelding van {$sub->name}.";

        SubprocessorChange::create([
            'subprocessor_id' => $sub->id,
            'change_type' => SubprocessorChange::TYPE_UPDATED,
            'summary' => $summary,
            'effective_from' => $effectiveFrom,
            'published_at' => now(),
        ]);

        $this->info("Bijgewerkt: {$sub->name}, ingangsdatum {$effectiveFrom}.");
        return self::SUCCESS;
    }
}
