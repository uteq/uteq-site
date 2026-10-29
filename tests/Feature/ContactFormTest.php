<?php

namespace Tests\Feature;

use App\Livewire\ContactForm;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Livewire\Features\SupportFileUploads\MissingFileUploadsTraitException;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_forged_file_upload_call_is_not_reported(): void
    {
        $this->expectException(MissingFileUploadsTraitException::class);

        try {
            Livewire::test(ContactForm::class)->call('_startUpload', 'content', [], false);
        } catch (MissingFileUploadsTraitException $e) {
            $this->assertFalse(app(ExceptionHandler::class)->shouldReport($e));

            throw $e;
        }
    }
}
