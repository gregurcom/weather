<?php

namespace Tests\Feature;

use Tests\TestCase;

class SettingsTest extends TestCase
{
    public function test_settings_page_with_all_set_parameters(): void
    {
        $response = $this->get(route('settings'));

        $response->assertOk()->assertSeeInOrder(['temperature', 'speed', 'pressure', 'precipitation', 'language']);
    }
}
