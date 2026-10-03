<?php

namespace Tests\Feature;

use Tests\TestCase;

class UnauthenticatedTest extends TestCase
{
    /**
     * De site heeft geen loginpagina; een niet-ingelogde browser-request op een
     * beschermde route moet een 401 geven in plaats van "Route [login] not defined."
     */
    public function testBrowserRequestOnProtectedRouteReturns401WithoutLoginRoute()
    {
        $this->get('/api/user', ['Accept' => 'text/html'])->assertUnauthorized();
    }

    public function testJsonRequestOnProtectedRouteReturns401()
    {
        $this->getJson('/api/user')->assertUnauthorized();
    }
}
