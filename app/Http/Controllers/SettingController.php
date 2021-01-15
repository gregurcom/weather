<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;

class SettingController extends Controller
{
    public function settings(SettingsRequest $request): RedirectREsponse|View
    {
        if ($request->isMethod('post')) {
            $request->session()->put('settings', [
                'temperature' => $request->temperature,
                'pressure' => $request->pressure,
                'speed' => $request->speed,
                'precipitation' => $request->precipitation,
            ]);

            return back()->with('status', 'You have successfully changed the settings');
        }

            return view('settings', ['previousPage' => $request->from, 'query' => $request->q]);
    }
}
