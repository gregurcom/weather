<?php

declare(strict_types = 1);

namespace Tests\Feature;

use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    public function test_home(): void
    {
        $response = $this->get('/');

        $response->assertOk()->assertSee('Weather App');
    }
}
