<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public string $name = '';
    public string $company = '';
    public string $email = '';
    public string $phone = '';
    public string $employees = '';
    public string $budget = '';
    public string $content = '';

    public bool $done = false;

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'employees' => 'nullable|string',
            'budget' => 'nullable|string',
            'content' => 'nullable|string|max:5000',
        ];
    }

    public function create(): void
    {
        $this->validate();

        Mail::to('info@uteq.nl')->send(new \App\Mail\Contact([
            'name' => $this->name,
            'company' => $this->company,
            'email' => $this->email,
            'phone' => $this->phone,
            'employees' => $this->employees,
            'budget' => $this->budget,
            'content' => $this->content,
        ]));

        $this->done = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
