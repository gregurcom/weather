<?php

namespace App\Http\Controllers;

class WeatherController extends Controller
{
    public function show()
    {
        return view('weather');
    }
}
