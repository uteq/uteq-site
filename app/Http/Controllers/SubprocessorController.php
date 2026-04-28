<?php

namespace App\Http\Controllers;

use App\Models\Subprocessor;
use App\Models\SubprocessorChange;
use App\Models\SubprocessorSubscription;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SubprocessorController extends Controller
{
    public function index()
    {
        $subprocessors = Subprocessor::query()
            ->active()
            ->ordered()
            ->get();

        $changes = SubprocessorChange::query()
            ->published()
            ->where('change_type', '!=', SubprocessorChange::TYPE_INITIAL)
            ->recent(12)
            ->orderByDesc('effective_from')
            ->orderByDesc('id')
            ->get();

        return view('pages.juridisch.subverwerkers', [
            'subprocessors' => $subprocessors,
            'changes' => $changes,
        ]);
    }

    public function rss()
    {
        $changes = SubprocessorChange::query()
            ->published()
            ->orderByDesc('effective_from')
            ->orderByDesc('id')
            ->limit(50)
            ->get();

        $xml = view('feeds.subverwerkers-rss', ['changes' => $changes])->render();

        return new Response($xml, 200, [
            'Content-Type' => 'application/rss+xml; charset=UTF-8',
        ]);
    }

    public function confirm(string $token)
    {
        $sub = SubprocessorSubscription::query()
            ->where('confirmation_token', $token)
            ->first();

        if (! $sub) {
            throw new NotFoundHttpException();
        }

        if (! $sub->confirmed_at) {
            $sub->confirm();
        }

        return view('pages.juridisch.subverwerkers-status', [
            'kind' => 'confirmed',
            'message' => 'Je aanmelding is bevestigd. Je krijgt een mail bij elke wijziging in de subverwerkerlijst.',
        ]);
    }

    public function unsubscribe(string $token)
    {
        $sub = SubprocessorSubscription::query()
            ->where('unsubscribe_token', $token)
            ->first();

        if (! $sub) {
            throw new NotFoundHttpException();
        }

        if (! $sub->unsubscribed_at) {
            $sub->unsubscribe();
        }

        return view('pages.juridisch.subverwerkers-status', [
            'kind' => 'unsubscribed',
            'message' => 'Je bent afgemeld voor wijzigingen in de subverwerkerlijst.',
        ]);
    }
}
