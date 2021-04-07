<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeatherRequest;
use App\Services\WeatherApiService;
use Illuminate\Http\Response;

class WeatherController extends Controller
{
    public function weatherAutoComplete(WeatherRequest $request, WeatherApiService $weatherApiService): Response
    {
        $cities = $weatherApiService->getSearch($request->q);

        return response($cities);
    }
}
