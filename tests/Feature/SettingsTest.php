<?php

namespace Tests\Feature;

use Tests\TestCase;

class SettingsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_settings_page()
    {
        $response = $this->get(route('settings'));

        $response->assertOk();
    }
}
