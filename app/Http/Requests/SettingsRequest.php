<?php

declare(strict_types = 1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    /**
     * @return array<string, string>
     */
    public function rules(): array
    {
        return [
            'temperature' => 'in:temp_c,temp_f',
            'speed' => 'in:wind_kph,wind_mph',
            'pressure' => 'in:pressure_mb,pressure_in',
            'precipitation' => 'in:precip_mm,precip_in',
            'language' => 'in:en,ru',
        ];
    }
}
