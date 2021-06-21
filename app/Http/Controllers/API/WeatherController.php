<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeatherRequest;
use App\Services\WeatherApiService;
use Illuminate\Http\Response;

class WeatherController extends Controller
{
    public function searchAutocomplete(WeatherRequest $request, WeatherApiService $weatherApiService): Response
    {
        try {
            $cities = $weatherApiService->getSearch($request->q);

            return response($cities);
        } catch (\Exception $e) {
            return response([$e->getMessage()]);
        }
    }
}
