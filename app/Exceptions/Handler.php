<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
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

    /**
     * De site heeft geen loginpagina: zonder 'login'-route geven we een 401
     * in plaats van een redirect naar een route die niet bestaat.
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if (! $exception->redirectTo($request) && ! Route::has('login')) {
            return $this->shouldReturnJson($request, $exception)
                ? response()->json(['message' => $exception->getMessage()], 401)
                : $this->prepareResponse($request, new HttpException(401, $exception->getMessage(), $exception));
        }

        return parent::unauthenticated($request, $exception);
    }
}
