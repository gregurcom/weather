<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'temperature' => 'in:temp_c,temp_f',
            'speed' => 'in:wind_kph,wind_mph',
            'pressure' => 'in:pressure_mb,pressure_in',
            'precipitation' => 'in:precip_mm,precip_in',
        ];
    }
}
