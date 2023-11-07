<?php

namespace App\Livewire;

use Filament\Forms\Components\Textarea;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use LivewireUI\Modal\ModalComponent;

class ContactForm extends ModalComponent implements HasForms
{
    public static function modalMaxWidth(): string
    {
        return '4xl';
    }

    use InteractsWithForms;

    public ?array $data = [];

    public bool $done = false;

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->inlineLabel()->label('Naam')->required(),
                TextInput::make('company')->inlineLabel()->label('Bedrijfsnaam')->required(),
                TextInput::make('email')->inlineLabel()->label('E-mailadres')->required(),
                TextInput::make('phone')->inlineLabel()->label('Telefoonnummer'),
                Textarea::make('content')->inlineLabel()->label('Bericht'),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        Mail::to('info@uteq.nl')->send(new \App\Mail\Contact($this->form->getState()));

        $this->done = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
