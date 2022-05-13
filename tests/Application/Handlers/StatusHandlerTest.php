<?php

namespace Tests\Application\Handlers;

use Tests\TestCase;

class StatusHandlerTest extends TestCase
{
    public function testHandleDoesReturnOk(): void
    {
        $this->get('/')->assertOk();
    }
}