<?php

namespace App\Console\Commands\Subprocessors;

use App\Models\Subprocessor;
use App\Models\SubprocessorChange;
use Illuminate\Console\Command;

class AddCommand extends Command
{
    protected $signature = 'subprocessor:add
        {--name= : Officiële naam}
        {--service= : Dienstomschrijving}
        {--data-location= : Datalocatie}
        {--transfer-basis= : Doorgiftegrondslag}
        {--model-training= : Beleid rond modeltraining}
        {--country= : ISO-landcode}
        {--effective-from= : Ingangsdatum (YYYY-MM-DD), default: 14 dagen vanaf nu}
        {--summary= : Samenvatting voor changelog/broadcast}';

    protected $description = 'Voeg een subverwerker toe en log een wijziging';

    public function handle(): int
    {
        $name = $this->option('name') ?: $this->ask('Naam');
        $service = $this->option('service') ?: $this->ask('Dienst');
        $dataLocation = $this->option('data-location') ?: $this->ask('Datalocatie');
        $transferBasis = $this->option('transfer-basis') ?: $this->ask('Doorgiftegrondslag');
        $modelTraining = $this->option('model-training') ?: $this->ask('Modeltraining', 'Niet van toepassing');
        $country = $this->option('country');
        $effectiveFrom = $this->option('effective-from') ?: now()->addDays(14)->toDateString();
        $summary = $this->option('summary') ?: "{$name} toegevoegd aan de subverwerkerlijst.";

        $sub = Subprocessor::create([
            'name' => $name,
            'service' => $service,
            'data_location' => $dataLocation,
            'transfer_basis' => $transferBasis,
            'model_training' => $modelTraining,
            'country_code' => $country,
            'sort_order' => (int) Subprocessor::max('sort_order') + 10,
            'active' => true,
            'effective_from' => $effectiveFrom,
        ]);

        SubprocessorChange::create([
            'subprocessor_id' => $sub->id,
            'change_type' => SubprocessorChange::TYPE_ADDED,
            'summary' => $summary,
            'effective_from' => $effectiveFrom,
            'published_at' => now(),
        ]);

        $this->info("Toegevoegd: {$sub->name} (id {$sub->id}), ingangsdatum {$effectiveFrom}.");
        $this->line('Draai php artisan subprocessor:broadcast om de wijziging naar abonnees te sturen.');

        return self::SUCCESS;
    }
}
