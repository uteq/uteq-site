<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    // Livewire throws these when a scanner sends a tampered request; they are not application errors.
    protected $dontReport = [
        \Livewire\Mechanisms\HandleComponents\CorruptComponentPayloadException::class,
        \Livewire\Features\SupportFileUploads\MissingFileUploadsTraitException::class,
    ];

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
