<?php

namespace Database\Seeders;

use App\Models\Subprocessor;
use App\Models\SubprocessorChange;
use Illuminate\Database\Seeder;

class SubprocessorSeeder extends Seeder
{
    public function run(): void
    {
        $effectiveFrom = '2026-04-01';

        $entries = [
            [
                'name' => 'Anthropic, Inc.',
                'service' => 'LLM-API (Claude)',
                'data_location' => 'VS, met EU-routing waar beschikbaar',
                'transfer_basis' => "EU-VS Data Privacy Framework + SCC's",
                'model_training' => 'Nee, opt-out via API',
                'country_code' => 'US',
            ],
            [
                'name' => 'OpenAI, LLC',
                'service' => 'LLM-API en embeddings',
                'data_location' => 'VS, met EU-routing voor enterprise',
                'transfer_basis' => "EU-VS Data Privacy Framework + SCC's",
                'model_training' => 'Nee, opt-out via API (zakelijk)',
                'country_code' => 'US',
            ],
            [
                'name' => 'Google LLC / Google Cloud',
                'service' => 'Gemini API, Cloud-componenten',
                'data_location' => 'EU waar geconfigureerd, anders VS',
                'transfer_basis' => "Adequaatheidsbesluit / SCC's",
                'model_training' => 'Nee, opt-out via API',
                'country_code' => 'US',
            ],
            [
                'name' => 'Hetzner Online GmbH',
                'service' => 'VPS-hosting, opslag',
                'data_location' => 'Duitsland (EU)',
                'transfer_basis' => 'Niet van toepassing (binnen EER)',
                'model_training' => 'Niet van toepassing',
                'country_code' => 'DE',
            ],
            [
                'name' => 'Laravel Forge / DigitalOcean',
                'service' => 'Server provisioning, hosting',
                'data_location' => 'EU-regio waar geconfigureerd',
                'transfer_basis' => "SCC's bij eventuele VS-doorgifte",
                'model_training' => 'Niet van toepassing',
                'country_code' => 'US',
            ],
            [
                'name' => 'Cloudflare, Inc.',
                'service' => 'CDN, DNS, DDoS-beveiliging',
                'data_location' => 'Wereldwijd edge, EU-eerste',
                'transfer_basis' => "EU-VS Data Privacy Framework + SCC's",
                'model_training' => 'Niet van toepassing',
                'country_code' => 'US',
            ],
            [
                'name' => 'Pinecone Systems, Inc.',
                'service' => 'Vector database (RAG)',
                'data_location' => 'VS, EU-regio op verzoek',
                'transfer_basis' => "SCC's",
                'model_training' => 'Niet van toepassing',
                'country_code' => 'US',
            ],
            [
                'name' => 'Stripe Payments Europe Ltd.',
                'service' => 'Betalingen, abonnementsbeheer',
                'data_location' => 'Ierland, met VS-doorgifte voor fraudedetectie',
                'transfer_basis' => "EU + SCC's",
                'model_training' => 'Niet van toepassing',
                'country_code' => 'IE',
            ],
            [
                'name' => 'Resend',
                'service' => 'Transactionele e-mail',
                'data_location' => 'EU-regio waar geconfigureerd',
                'transfer_basis' => "SCC's bij VS-doorgifte",
                'model_training' => 'Niet van toepassing',
                'country_code' => 'US',
            ],
            [
                'name' => 'Plausible Analytics',
                'service' => 'Privacy-vriendelijke analytics',
                'data_location' => 'Estland (EU)',
                'transfer_basis' => 'Niet van toepassing (binnen EER)',
                'model_training' => 'Niet van toepassing',
                'country_code' => 'EE',
            ],
        ];

        foreach ($entries as $index => $data) {
            $sub = Subprocessor::updateOrCreate(
                ['name' => $data['name']],
                array_merge($data, [
                    'sort_order' => $index,
                    'active' => true,
                    'effective_from' => $effectiveFrom,
                ]),
            );

            // Initiële changelog-entry voor de baseline
            SubprocessorChange::firstOrCreate(
                [
                    'subprocessor_id' => $sub->id,
                    'change_type' => SubprocessorChange::TYPE_INITIAL,
                ],
                [
                    'summary' => "Initiële opname van {$sub->name} in subverwerkerlijst.",
                    'effective_from' => $effectiveFrom,
                    'published_at' => now(),
                ],
            );
        }
    }
}
