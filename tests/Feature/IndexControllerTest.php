<?php

namespace Tests\Feature;

use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    public function test_home_page_with_app_name(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk()->assertSee('Weather App');
    }
}
