<?php

namespace Tests\Feature;

use Tests\TestCase;

class SettingsControllerTest extends TestCase
{
    public function test_get_settings_page(): void
    {
        $response = $this->get('/settings');

        $response->assertOk()
            ->assertSeeInOrder(['temperature', 'speed', 'pressure', 'precipitation', 'language']);
    }

    public function test_post_settings_page(): void
    {
        $response = $this->post('/settings', [
            'temperature' => 'temp_f',
            'pressure' => 'pressure_mb',
            'speed' => 'wind_kph',
            'precipitation' => 'precip_mm',
            'language' => 'ru',
        ]);

        $response->assertStatus(302)
            ->assertSessionHas('_flash.new');
    }
}
