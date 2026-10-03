<?php

namespace Tests\Feature;

use Tests\TestCase;

class UnauthenticatedTest extends TestCase
{
    /**
     * De ongebruikte route /api/user gaf voor niet-ingelogde browser-requests
     * "Route [login] not defined." omdat de site geen loginpagina heeft.
     */
    public function testApiUserRouteDoesNotExist()
    {
        $this->get('/api/user', ['Accept' => 'text/html'])->assertNotFound();
    }
}
