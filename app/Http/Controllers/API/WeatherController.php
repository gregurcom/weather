<?php

declare(strict_types = 1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeatherRequest;
use App\Services\WeatherApiService;
use Illuminate\Http\JsonResponse;

class WeatherController extends Controller
{
    public function searchAutocomplete(WeatherRequest $request, WeatherApiService $weatherApiService): JsonResponse
    {
        try {
            $cities = $weatherApiService->getSearch($request->q);

            return response()->json($cities);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
