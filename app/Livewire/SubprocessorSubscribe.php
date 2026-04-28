<?php

namespace App\Livewire;

use App\Mail\SubprocessorSubscriptionConfirmation;
use App\Models\SubprocessorSubscription;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SubprocessorSubscribe extends Component
{
    public string $email = '';
    public string $name = '';
    public string $hp = '';
    public bool $done = false;

    protected function rules(): array
    {
        return [
            'email' => 'required|email|max:255',
            'name' => 'nullable|string|max:255',
            'hp' => 'prohibited',
        ];
    }

    public function subscribe(): void
    {
        $this->validate();

        $sub = SubprocessorSubscription::query()
            ->updateOrCreate(
                ['email' => strtolower(trim($this->email))],
                [
                    'name' => $this->name !== '' ? $this->name : null,
                    'unsubscribed_at' => null,
                    'ip_address' => request()->ip(),
                ],
            );

        Mail::to($sub->email)->queue(new SubprocessorSubscriptionConfirmation($sub));

        $this->done = true;
    }

    public function render()
    {
        return view('livewire.subprocessor-subscribe');
    }
}
