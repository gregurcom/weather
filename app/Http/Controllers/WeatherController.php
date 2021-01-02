<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class WeatherController extends Controller
{
    public function weather(): View
    {
        return view('weather');
    }
}
