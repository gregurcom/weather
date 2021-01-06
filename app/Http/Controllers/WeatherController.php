<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Services\WeatherApiService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class WeatherController extends Controller
{
    protected $weatherApiService;

    public function __construct(WeatherApiService $weatherApiService)
    {
        $this->weatherApiService = $weatherApiService;
    }

    public function weather(WeatherRequest $request): View|RedirectResponse
    {
        $response = $this->weatherApiService->weatherApi($request);

        if ($response->successful()) {
            return view('weather', ['data' => $response->json()]);
        } else {
            return redirect()
                ->route('home')
                ->with('status', 'City ​​was not found');
        }
    }

    public function map(WeatherRequest $request): View|RedirectResponse
    {
        $response = $this->weatherApiService->weatherApi($request);

        if ($response->successful()) {
            return view('map', ['data' => $response->json()]);
        } else {
            return redirect()
                ->route('home')
                ->with('status', 'City ​​was not found');
        }
    }
}

