<?php

namespace Tests\Feature;

use App\Models\Subprocessor;
use App\Models\SubprocessorChange;
use App\Models\SubprocessorSubscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SubprocessorTest extends TestCase
{
    use RefreshDatabase;

    public function test_subverwerkers_page_shows_active_entries(): void
    {
        Subprocessor::factory()->create(['name' => 'Anthropic, Inc.', 'service' => 'LLM-API', 'sort_order' => 1]);
        Subprocessor::factory()->create(['name' => 'Hetzner Online GmbH', 'service' => 'VPS-hosting', 'sort_order' => 2]);
        Subprocessor::factory()->inactive()->create(['name' => 'OldVendor B.V.']);

        $this->get(route('juridisch.subverwerkers'))
            ->assertSuccessful()
            ->assertSee('Subverwerkerlijst')
            ->assertSee('Anthropic, Inc.')
            ->assertSee('Hetzner Online GmbH')
            ->assertDontSee('OldVendor');
    }

    public function test_subverwerkers_page_shows_recent_changelog(): void
    {
        $sub = Subprocessor::factory()->create(['name' => 'NewVendor Ltd.']);
        SubprocessorChange::factory()->create([
            'subprocessor_id' => $sub->id,
            'change_type' => SubprocessorChange::TYPE_ADDED,
            'summary' => 'NewVendor Ltd. toegevoegd voor analytics.',
            'effective_from' => now()->subMonth()->toDateString(),
            'published_at' => now()->subMonth(),
        ]);

        $this->get(route('juridisch.subverwerkers'))
            ->assertSee('NewVendor Ltd. toegevoegd voor analytics.');
    }

    public function test_rss_feed_returns_xml(): void
    {
        $sub = Subprocessor::factory()->create();
        SubprocessorChange::factory()->create([
            'subprocessor_id' => $sub->id,
            'summary' => 'Provider X gemigreerd naar EU-regio.',
            'published_at' => now()->subDay(),
        ]);

        $response = $this->get(route('juridisch.subverwerkers.rss'));
        $response->assertSuccessful()
            ->assertHeader('Content-Type', 'application/rss+xml; charset=UTF-8')
            ->assertSee('<rss', false)
            ->assertSee('Provider X gemigreerd naar EU-regio.', false);
    }

    public function test_subscription_creates_unconfirmed_record_and_sends_mail(): void
    {
        Mail::fake();

        \Livewire\Livewire::test(\App\Livewire\SubprocessorSubscribe::class)
            ->set('email', 'klant@example.com')
            ->set('name', 'Klant')
            ->call('subscribe')
            ->assertSet('done', true);

        $this->assertDatabaseHas('subprocessor_subscriptions', [
            'email' => 'klant@example.com',
            'name' => 'Klant',
            'confirmed_at' => null,
        ]);

        Mail::assertQueued(\App\Mail\SubprocessorSubscriptionConfirmation::class);
    }

    public function test_subscription_rejects_invalid_email(): void
    {
        \Livewire\Livewire::test(\App\Livewire\SubprocessorSubscribe::class)
            ->set('email', 'niet-een-email')
            ->call('subscribe')
            ->assertHasErrors(['email']);

        $this->assertDatabaseCount('subprocessor_subscriptions', 0);
    }

    public function test_confirm_link_activates_subscription(): void
    {
        $sub = SubprocessorSubscription::factory()->unconfirmed()->create();

        $this->get(route('juridisch.subverwerkers.confirm', $sub->confirmation_token))
            ->assertSuccessful()
            ->assertSee('bevestigd');

        $this->assertNotNull($sub->fresh()->confirmed_at);
    }

    public function test_unsubscribe_link_marks_subscription_inactive(): void
    {
        $sub = SubprocessorSubscription::factory()->create();

        $this->get(route('juridisch.subverwerkers.unsubscribe', $sub->unsubscribe_token))
            ->assertSuccessful()
            ->assertSee('afgemeld');

        $this->assertNotNull($sub->fresh()->unsubscribed_at);
    }

    public function test_invalid_token_returns_404(): void
    {
        $this->get(route('juridisch.subverwerkers.confirm', 'no-such-token'))
            ->assertNotFound();
        $this->get(route('juridisch.subverwerkers.unsubscribe', 'no-such-token'))
            ->assertNotFound();
    }
}
