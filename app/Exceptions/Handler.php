<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Livewire\Features\SupportFileUploads\MissingFileUploadsTraitException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Forged requests from bots, not errors in our code.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        MissingFileUploadsTraitException::class,
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
