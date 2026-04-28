<?php

namespace App\Console\Commands\Subprocessors;

use App\Mail\SubprocessorChangeBroadcast;
use App\Models\SubprocessorChange;
use App\Models\SubprocessorSubscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class BroadcastCommand extends Command
{
    protected $signature = 'subprocessor:broadcast
        {--dry-run : Toon alleen wat verstuurd zou worden, zonder mails te versturen}';

    protected $description = 'Stuur niet-eerder-uitgestuurde wijzigingen naar bevestigde abonnees';

    public function handle(): int
    {
        $changes = SubprocessorChange::query()
            ->published()
            ->whereNull('broadcast_at')
            ->where('change_type', '!=', SubprocessorChange::TYPE_INITIAL)
            ->orderBy('effective_from')
            ->get();

        if ($changes->isEmpty()) {
            $this->info('Geen niet-uitgestuurde wijzigingen gevonden.');
            return self::SUCCESS;
        }

        $subscribers = SubprocessorSubscription::query()->active()->get();
        $count = $subscribers->count();

        $this->line("Wijzigingen om uit te sturen: {$changes->count()}");
        $this->line("Actieve abonnees: {$count}");

        if ($this->option('dry-run')) {
            foreach ($changes as $c) {
                $this->line(sprintf('  [%s] %s · %s', $c->change_type, $c->effective_from->toDateString(), $c->summary));
            }
            return self::SUCCESS;
        }

        if ($count === 0) {
            $this->warn('Geen abonnees, markeer changes alleen als verzonden.');
            $changes->each(fn (SubprocessorChange $c) => $c->forceFill(['broadcast_at' => now()])->save());
            return self::SUCCESS;
        }

        foreach ($subscribers as $sub) {
            Mail::to($sub->email)->queue(new SubprocessorChangeBroadcast($changes, $sub));
        }

        $changes->each(fn (SubprocessorChange $c) => $c->forceFill(['broadcast_at' => now()])->save());

        $this->info("Broadcast gequeued voor {$count} abonnees.");
        return self::SUCCESS;
    }
}
