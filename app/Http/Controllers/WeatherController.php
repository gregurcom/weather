<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Models\Subscription;
use App\Models\User;
use App\Services\HistoryService;
use App\Services\WeatherApiService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class WeatherController extends Controller
{
    public function weather(WeatherRequest $request, WeatherApiService $weatherApiService, HistoryService $historyService): View|RedirectResponse
    {
        $data = $weatherApiService->getCurrentWeather($request->q);

        if ($data != null) {
            $historyService->save($request->q);

            return view('weather', ['data' => $data, 'query' => $request->q]);
        }

        return redirect()
            ->route('home')
            ->with('status',  __('app.alert.city_not_found '));
    }

    public function map(WeatherRequest $request, WeatherApiService $weatherApiService): View|RedirectResponse
    {
        $data = $weatherApiService->getCurrentWeather($request->q);

        if ($data != null) {
            return view('map', ['data' => $data, 'query' => $request->q]);
        }

        return redirect()
            ->route('home')
            ->with('status',  __('app.alert.city_not_found '));
    }

    public function subscribe(Request $request): RedirectResponse|View
    {
        if (Auth::check()) {
            $city = Subscription::where('user_id', Auth::id())->where('name', $request->city)->get();

            if (count($city) === 0) {
                Subscription::create([
                    'name' => $request->city,
                    'user_id' => Auth::id(),
                ]);
                return back()->with('status', __('app.alert.subscribe_city'));
            }

            return back()->with('status', __('app.alert.already_subscribe'));
        }

        return view('auth.login');
    }
}

